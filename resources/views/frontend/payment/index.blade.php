<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <!-- Import Bootstrap, Font Awesome, and Google Fonts -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            color: #333;
            background-color: #f8f9fa;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .hero-section {
            position: relative;
            background: url('https://images.pexels.com/photos/258154/pexels-photo-258154.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') no-repeat center center/cover;
            height: 30vh;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .hero-section .hero-text {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 8px;
        }
        .payment-page {
            text-align: center;
            padding: 40px 20px;
        }
        .payment-page h1 {
            font-size: 2rem;
            color: #6c757d;
            margin-bottom: 20px;
            font-weight: 700;
        }
        .details-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
            text-align: left;
        }
        .details-container h2 {
            font-size: 1.5rem;
            color: #343a40;
            margin-bottom: 15px;
        }
        .details-container p {
            font-size: 1rem;
            color: #495057;
            margin-bottom: 10px;
        }
        .btn-primary {
            background-color: #ff6f61;
            border-color: #ff6f61;
            transition: background-color 0.3s ease, border-color 0.3s ease, transform 0.3s ease;
            color: white!important;
        }
        .btn-primary:hover {
            background-color: #ff5a4d;
            border-color: #ff5a4d;
            transform: scale(1.05);
        }
        .form-group label {
            font-weight: 700;
        }
        #card-element {
            background-color: #fff;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ced4da;
        }
        #card-errors {
            color: #dc3545;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    @include('components.navbar')

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-text">
            <h1>Complete Your Payment</h1>
            <p>Review your reservation details and proceed with the payment.</p>
        </div>
    </div>

    <!-- Page Content -->
    <div class="container payment-page">
        <h1>Payment Details</h1>

        <div class="details-container">
            <h2>Reservation Summary</h2>
            <p><strong>Room:</strong> {{ $room->name }}</p>
            <p><strong>Check-in:</strong> {{ $checkIn }}</p>
            <p><strong>Check-out:</strong> {{ $checkOut }}</p>
            <p><strong>Total Price:</strong> {{ number_format($totalPrice, 2, ',', '.') }} €</p>
        </div>

        <form id="payment-form" action="{{ route('payment.process') }}" method="POST">
            @csrf
            <input type="hidden" name="room_id" value="{{ $room->id }}">
            <input type="hidden" name="check_in" value="{{ $checkIn }}">
            <input type="hidden" name="check_out" value="{{ $checkOut }}">
            <input type="hidden" name="total_price" value="{{ $totalPrice }}">

            <div class="form-group">
                <label for="card-element">Credit or Debit Card</label>
                <div id="card-element"></div>
                <div id="card-errors" role="alert"></div>
            </div>
            
            <button type="submit" class="btn btn-primary">Pay Now</button>
        </form>
    </div>

    <!-- Import Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        var stripePublicKey = "{{ $stripePublicKey }}";
        var stripe = Stripe(stripePublicKey);
        var elements = stripe.elements();
        var card = elements.create('card');
        card.mount('#card-element');

        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', result.token.id);
                    form.appendChild(hiddenInput);

                    form.submit();
                }
            });
        });
    </script>
</body>
</html>
