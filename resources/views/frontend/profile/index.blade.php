<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile - Oasis</title>
    <!-- Import Bootstrap and Font Awesome CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            color: #333;
        }
        .hero-section {
            position: relative;
            background: url('https://images.pexels.com/photos/258154/pexels-photo-258154.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') no-repeat center center/cover;
            height: 40vh;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .hero-section .hero-text {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 5px;
        }
        .profile-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: -50px;
            position: relative;
            z-index: 1;
        }
        .profile-details, .reservation-list {
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .profile-details h2, .reservation-list h2 {
            font-weight: 700;
            margin-bottom: 20px;
            color: #ff6f61;
        }
        .profile-details p, .reservation-list p {
            margin-bottom: 10px;
            color: #555;
        }
        .nav-link{
            color:black;
        }
        .nav-link:hover{
            color: black;
        }
        .table {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }
        .table thead th {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            border: none;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table tbody td {
            vertical-align: middle;
            text-align: center;
            color: #555;
        }
        .btn-primary {
            background-color: #ff6f61;
            border-color: #ff6f61;
        }
        .btn-primary:hover {
            background-color: #ff5a4d;
            border-color: #ff5a4d;
        }
    </style>
</head>
<body>

    @include('components.navbar')

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-text">
            <h1>Customer Profile</h1>
            <p>Here you can view your information and booking history</p>
        </div>
    </div>

    <!-- Profile Content -->
    <div class="container spacing">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="profile-container">
                    <!-- Profile Details -->
                    <div class="profile-details">
                        <h2>Profile Details</h2>
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Registration Date:</strong> {{ $user->created_at->format('d/m/Y') }}</p>
                    </div>

                    <!-- Reservation List Tabs -->
                    <div class="reservation-list">
                        <h2>My Reservations</h2>

                        <!-- Tabs -->
                        <ul class="nav nav-tabs" id="reservationTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="new-reservations-tab" data-toggle="tab" href="#new-reservations" role="tab" aria-controls="new-reservations" aria-selected="true">New Reservations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="old-reservations-tab" data-toggle="tab" href="#old-reservations" role="tab" aria-controls="old-reservations" aria-selected="false">Old Reservations</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="reservationTabsContent">
                            <!-- New Reservations Tab -->
                            <div class="tab-pane fade show active" id="new-reservations" role="tabpanel" aria-labelledby="new-reservations-tab">
                                @if($newReservations->isEmpty())
                                    <p>No new reservations found.</p>
                                @else
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Room</th>
                                                <th>Guests</th>
                                                <th>Check-in</th>
                                                <th>Check-out</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($newReservations as $reservation)
                                                <tr>
                                                    <td>{{ $reservation->room->name }}</td>
                                                    <td>{{ $reservation->number_of_guests }}</td>
                                                    <td>{{ $reservation->check_in }}</td>
                                                    <td>{{ $reservation->check_out }}</td>
                                                    <td>{{ $reservation->total_price }} €</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                            <!-- Old Reservations Tab -->
                            <div class="tab-pane fade" id="old-reservations" role="tabpanel" aria-labelledby="old-reservations-tab">
                                @if($oldReservations->isEmpty())
                                    <p>No old reservations found.</p>
                                @else
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Room</th>
                                                <th>Guests</th>
                                                <th>Check-in</th>
                                                <th>Check-out</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($oldReservations as $reservation)
                                                <tr>
                                                    <td>{{ $reservation->room->name }}</td>
                                                    <td>{{ $reservation->number_of_guests }}</td>
                                                    <td>{{ $reservation->check_in }}</td>
                                                    <td>{{ $reservation->check_out }}</td>
                                                    <td>{{ $reservation->total_price }} €</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('components.footer')

    <!-- Import Bootstrap and dependency JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
