<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Recepção</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
        }
        .dashboard-header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
            border-bottom: 4px solid #0056b3;
        }
        .dashboard-header h1 {
            margin: 0;
        }
        .dashboard-nav {
            margin: 20px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .dashboard-nav a {
            display: block;
            width: 100%;
            max-width: 300px;
            padding: 15px;
            margin: 10px;
            text-decoration: none;
            color: #fff;
            background-color: #28a745;
            border-radius: 5px;
            text-align: center;
            font-size: 1.25rem;
            transition: background-color 0.3s, transform 0.3s;
        }
        .dashboard-nav a:hover {
            background-color: #218838;
            transform: scale(1.05);
        }
        .btn-logout {
            display: block;
            width: 100%;
            max-width: 300px;
            padding: 10px;
            margin: 20px auto;
            text-decoration: none;
            color: #fff;
            background-color: #dc3545;
            border-radius: 5px;
            text-align: center;
            font-size: 1rem;
            transition: background-color 0.3s;
        }
        .btn-logout:hover {
            background-color: #c82333;
        }
        .container {
            max-width: 800px;
        }
    </style>
</head>
<body>
    <div class="dashboard-header">
        <h1>Administration Panel</h1>
        <p>Welcome to the administration panel.</p>
    </div>
    
    <div class="container">
        <div class="dashboard-nav">
            <a href="{{ route('admin.rooms') }}"><i class="fas fa-bed"></i> Rooms</a>
            <a href="{{ route('admin.reservations') }}"><i class="fas fa-calendar-check"></i> Reserves</a>
        </div>
        <a href="{{ route('admin.logout') }}" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
