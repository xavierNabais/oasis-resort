<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Details</title>
    <!-- Importar CSS do Bootstrap, Font Awesome e Flatpickr -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="/css/app.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            color: #333;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .hero-section {
            position: relative;
            background: url('https://images.pexels.com/photos/258154/pexels-photo-258154.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') no-repeat center center/cover;
            height: 50vh;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .container{
            margin-bottom:5%;
        }
        .hero-section .hero-text {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 5px;
        }
        .card-header {
            background-color: #f8f9fa;
        }
        .card-body {
            padding: 20px;
        }
        .btn-primary {
            background-color: #ff6f61;
            border-color: #ff6f61;
        }
        .btn-primary:hover {
            background-color: #ff5a4d;
            border-color: #ff5a4d;
        }

        /* Estilos personalizados para o calendário */
        .flatpickr-day.selected {
            background-color: #ff6f61;
            color: white;
        }
        .flatpickr-day.start-range {
            border-radius: 50%;
            background-color: #ff6f61;
            color: white;
        }
        .flatpickr-day.in-range {
            background-color: #ffe0e0;
        }

        .quantity-control {
            display: flex;
            align-items: center;
        }

        .quantity-btn {
            background:none;
            border: none;
            color: black;
            padding: 10px;
            cursor: pointer;
            font-size: 18px;
            width: 40px;
            height: 40px;
            text-align: center;
            outline:none;
        }

        .quantity-btn:hover {
            color: #ff5a4d;
        }

        .quantity-btn:focus{
            outline:none;
        }

        .quantity-btn:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .number_of_guests {
            width: 50px;
            height:40px;
            text-align: center;
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 18px;
            border-radius: 10px;
        }

    </style>
</head>
<body>

    @include('components.navbar')

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-text">
            <h1>Room Details</h1>
            <p>Verify room details and make your reservation</p>
        </div>
    </div>

    <!-- Conteúdo da Página -->
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>{{ $room->name }}</h2>
            </div>
            <div class="card-body">
                <img src="{{ asset($room->image_url) }}" style="margin-bottom:10px; width:75%">
                <p>{{ $room->description }}</p>
                <p><strong>Room Type:</strong> {{ $room->type }}</p>
                <p><strong>Price per night:</strong> {{ $room->price_per_night }} €</p>

                <form action="{{ route('payment.page') }}" method="GET">
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    <input type="hidden" name="check_in" id="check_in">
                    <input type="hidden" name="check_out" id="check_out">
                    <input type="hidden" name="total_price" id="total_price">
                    <div class="form-group">
                        <label for="guests"><strong>Number of guests:</strong></label>
                        <button type="button" class="quantity-btn" id="decrement">-</button>
                        <input type="text" id="number_of_guests" class="number_of_guests" name="number_of_guests" value="1" readonly>
                        <button type="button" class="quantity-btn" id="increment">+</button>
                    </div>
                    <div class="form-group">
                        <label for="date_range">Check-in and Check-out:</label>
                        <input type="text" class="form-control" id="date_range" name="date_range" required>
                    </div>
                    <div class="form-group">
                        <label for="total_price_display">Total Price:</label>
                        <input type="text" class="form-control" id="total_price_display" readonly>
                    </div>
                    <div class="form-group">
                        <label for="promo_code">Promo Code</label>
                        <div class="input-group">
                            <input type="text" name="promo_code" id="promo_code" class="form-control" placeholder="Enter promo code">
                            <div class="input-group-append">
                                <button type="button" id="apply-promo" class="btn btn-primary">Utilizar</button>
                            </div>
                        </div>
                        <small id="promo-message" class="form-text text-muted"></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Proceed to Payment</button>
                </form>


            </div>
        </div>
    </div>

    <!-- Importar JavaScript do Bootstrap e Flatpickr -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/pt.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dateRangeInput = document.getElementById('date_range');
            var totalPriceInput = document.getElementById('total_price');
            var pricePerNight = {{ $room->price_per_night }};

            var today = new Date().toISOString().split('T')[0];

        
            function calculateTotalPrice(startDate, endDate) {
            var oneDay = 24 * 60 * 60 * 1000; // Número de milissegundos em um dia
            var start = new Date(startDate);
            var end = new Date(endDate);
            var days = Math.round((end - start) / oneDay);
            return days > 0 ? days * pricePerNight : 0;
            }

            function updateTotalPrice(selectedDates) {
                var startDate = selectedDates[0];
                var endDate = selectedDates[1] || startDate;
                var totalPrice = calculateTotalPrice(startDate, endDate);
                totalPriceInput.value = totalPrice.toFixed(2); // Atualiza o input hidden com o valor total
                document.getElementById('total_price_display').value = ` ${totalPrice.toFixed(2)} €`; // Atualiza o input de exibição
            }


            // Função para obter intervalos de datas desativadas
            function getDisabledDateRanges() {
                return <?php
                    // Gerar array de intervalos de datas desativadas a partir do PHP
                    echo json_encode(
                        $reservations->map(function ($reservation) {
                            $start = new DateTime($reservation->check_in);
                            $end = new DateTime($reservation->check_out);
                            return [
                                'from' => $start->format('Y-m-d'),
                                'to' => $end->format('Y-m-d')
                            ];
                        })->toArray()
                    );
                ?>;
            }

            var disabledDateRanges = getDisabledDateRanges();

            function isDateInRange(date, range) {
                var start = new Date(range.from);
                var end = new Date(range.to);
                return date >= start && date <= end;
            }

            function generateDisabledDates() {
                var disabledDates = [];
                disabledDateRanges.forEach(function(range) {
                    var start = new Date(range.from);
                    var end = new Date(range.to);
                    while (start <= end) {
                        disabledDates.push(start.toISOString().split('T')[0]);
                        start.setDate(start.getDate() + 1);
                    }
                });
                return disabledDates;
            }

            function updateStyles(instance) {
                var selectedDates = instance.selectedDates;
                if (selectedDates.length > 0) {
                    var startDate = selectedDates[0];
                    var endDate = selectedDates[1] || startDate;

                    // Limpar estilos antigos
                    instance.calendarContainer.querySelectorAll('.flatpickr-day').forEach(day => {
                        day.classList.remove('start-range', 'in-range');
                    });

                    // Adicionar estilo ao início do intervalo
                    var startElem = instance.calendarContainer.querySelector('.flatpickr-day[aria-label="' + startDate.toDateString() + '"]');
                    if (startElem) startElem.classList.add('start-range');

                    // Adicionar estilo ao intervalo de dias
                    if (endDate > startDate) {
                        var date = new Date(startDate);
                        while (date <= endDate) {
                            var dayElem = instance.calendarContainer.querySelector('.flatpickr-day[aria-label="' + date.toDateString() + '"]');
                            if (dayElem) dayElem.classList.add('in-range');
                            date.setDate(date.getDate() + 1);
                        }
                    }

                    // Atualizar o preço total
                    updateTotalPrice(selectedDates);
                }
            }

            // Inicializar o Flatpickr
            flatpickr(dateRangeInput, {
                mode: 'range',
                minDate: today,
                onChange: function(selectedDates, dateStr, instance) {
                    updateStyles(instance);
                },
                disable: generateDisabledDates().map(date => ({ from: date, to: date }))
            });
        });
    </script>
    
    <!-- Import jQuery and Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script>
        $(document).ready(function() {
        $('#apply-promo').on('click', function() {
            var promoCode = $('#promo_code').val().trim();
            if (promoCode) {
                $.ajax({
                    url: '{{ route('promo.validate') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        code: promoCode
                    },
                    success: function(response) {
                        var totalPrice = parseFloat($('#total_price').val()); // Preço total antes do desconto
                        if (response.success) {
                            var discountPercent = parseFloat(response.discount); // Percentual de desconto recebido da API
                            var discountAmount = (totalPrice * discountPercent) / 100; // Calcula o valor do desconto
                            var discountedPrice = totalPrice - discountAmount; // Calcula o preço com desconto
                            $('#total_price_display').val(`${discountedPrice.toFixed(2)} €`); // Atualiza o preço exibido
                            $('#total_price').val(discountedPrice.toFixed(2)); // Atualiza o valor total escondido
                            $('#promo-message').text(`Desconto de ${discountPercent} % aplicado.`).removeClass('text-danger').addClass('text-success');

                            // Desabilita o botão após aplicar o desconto
                            $('#apply-promo').prop('disabled', true);
                        } else {
                            $('#promo-message').text(response.message || 'Código inválido ou expirado.').removeClass('text-success').addClass('text-danger');
                        }
                    },
                    error: function(xhr) {
                        $('#promo-message').text('Erro ao validar o código.').removeClass('text-success').addClass('text-danger');
                    }
                });
            } else {
                $('#promo-message').text('Por favor, insira um código promocional.').removeClass('text-success').addClass('text-danger');
            }
        });
    });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var decrementButton = document.getElementById('decrement');
        var incrementButton = document.getElementById('increment');
        var guestInput = document.getElementById('number_of_guests');

        decrementButton.addEventListener('click', function() {
            var currentValue = parseInt(guestInput.value);
            if (currentValue > 1) {
                guestInput.value = currentValue - 1;
            }
        });

        incrementButton.addEventListener('click', function() {
            var currentValue = parseInt(guestInput.value);
            if (currentValue < 8) {
                guestInput.value = currentValue + 1;
            }
        });
    });
</script>


    <!-- Footer -->
@include('components.footer')

</body>
</html>
