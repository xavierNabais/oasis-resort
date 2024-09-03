<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas - Backoffice</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .header {
            background-color: #007bff;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            border-bottom: 4px solid #0056b3;
        }
        .header h1 {
            margin: 0;
            font-size: 2.5rem;
        }
        .search-form {
            margin-bottom: 20px;
        }
        .search-form input {
            border-radius: 25px 0 0 25px;
            border: 1px solid #ced4da;
        }
        .search-form button {
            border-radius: 0 25px 25px 0;
            background-color: #007bff;
            border: 1px solid #007bff;
        }
        .search-form button:hover {
            background-color: #0056b3;
            border: 1px solid #0056b3;
        }
        .table thead th {
            background-color: #343a40;
            color: #fff;
            text-align: center;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table tbody td {
            vertical-align: middle;
            text-align: center;
        }
        .btn-sm {
            padding: 5px 10px;
            font-size: 0.875rem;
        }
        .btn-edit {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
        }
        .btn-edit:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }
        .btn-delete {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-delete:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .logout-btn {
            margin-bottom: 20px;
            display: block;
            width: 200px;
            margin: 20px auto;
            text-align: center;
            border-radius: 5px;
            background-color: #dc3545;
            color: #fff;
            padding: 10px;
            font-size: 1rem;
            transition: background-color 0.3s;
            text-decoration: none;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Reservation Administration</h1>
    </div>

    <div class="container mt-5">
        <a href="{{ route('admin.logout') }}" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>

        <div class="btn-group" role="group" aria-label="Navigation">
            <a href="{{ route('admin.rooms') }}" class="btn btn-primary">
                <i class="fas fa-bed"></i> Rooms
            </a>
            <a href="{{ route('admin.reservations') }}" class="btn btn-primary">
                <i class="fas fa-calendar-alt"></i> Reservations
            </a>
        </div>


        <div class="search-form mb-3">
            <form method="GET" action="{{ route('admin.reservations') }}">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search for client email" value="{{ request()->get('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <h2>Reservations List</h2>
        
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Room</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->client->email }}</td>
                        <td>{{ $reservation->room->name }}</td>
                        <td>{{ $reservation->check_in }}</td>
                        <td>{{ $reservation->check_out }}</td>
                        <td>
                            <a href="" class="btn btn-edit btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <form action="{{ route('reserve.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete btn-sm">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No reservation found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
