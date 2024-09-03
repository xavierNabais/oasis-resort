<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Confirmed</title>
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
            border-radius: 8px;
        }
        .success-page {
            text-align: center;
            padding: 40px 20px;
        }
        .success-page h1 {
            font-size: 2rem;
            color: #6c757d;
            margin-bottom: 15px;
            font-weight: 700;
        }
        .success-page .icon {
            font-size: 4rem;
            color: #28a745;
            margin-bottom: 20px;
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
            background-color: #58422f;
            border-color: #007bff;
            transition: background-color 0.3s ease, border-color 0.3s ease, transform 0.3s ease;
            color:white!important;
        }
        .btn-primary:hover {
            background-color: #c5a180;
            border-color: #c5a180;
            transform: scale(1.1);
        }
        .success-page a {
            color: brown;
            text-decoration: none;
        }
        .info-tips {
            margin-top: 20px;
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
            text-align: left;
        }
        .info-tips h3 {
            font-size: 1.25rem;
            color: #343a40;
            margin-bottom: 15px;
        }
        .info-tips ul {
            list-style: none;
            padding: 0;
        }
        .info-tips ul li {
            padding: 8px 0;
            border-bottom: 1px solid #dee2e6;
        }
        .info-tips ul li:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>

    @include('components.navbar')

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-text">
            <h1>Reservation Confirmed!</h1>
            <p>We are thrilled to confirm your reservation.</p>
        </div>
    </div>

    <!-- Page Content -->
    <div class="container success-page">

        <h1>Reservation Confirmed</h1>
        <div class="details-container">
            <h2>Reservation Details</h2>
            <p><strong>Reservation Date:</strong> {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}</p>
            <p><strong>Room:</strong> {{ $reservation->room->name }}</p>
            <p><strong>Check-in:</strong> {{ $reservation->check_in }}</p>
            <p><strong>Check-out:</strong> {{ $reservation->check_out }}</p>
            <p><strong>Total Price:</strong> {{ $reservation->total_price}} €</p>
        </div>
        <p>Thank you for your reservation! Your booking has been completed successfully.</p>
        <p>You can view the details of your reservation in your <a href="{{ route('user.profile') }}">profile page</a>.</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Return to Homepage</a>

        <!-- Arrival Tips -->
        <div class="info-tips">
            <h3>Arrival Tips</h3>
            <ul>
                <li>Upon arrival at the resort, proceed to the reception desk to check in.</li>
                <li>Bring a copy of your reservation confirmation and a valid ID.</li>
                <li>If you have any special requests or needs, please inform the reception.</li>
                <li>Confirm check-in and check-out times with the reception desk.</li>
                <li>Inspect your room upon arrival and report any issues immediately.</li>
            </ul>
        </div>
    </div>

    <!-- Import Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
