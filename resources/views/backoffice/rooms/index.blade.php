<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quartos - Backoffice</title>
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
        .search-form input, .search-form select {
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
        .reset-btn {
            background-color: #6c757d;
            border-color: #6c757d;
            color: #fff;
            margin-left: 10px;
        }
        .reset-btn:hover {
            background-color: #5a6268;
            border-color: #545b62;
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
        .room-image {
            width: 150px;
            height: auto;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .no-image {
            color: #6c757d;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Room Administration</h1>
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

        <div class="search-form mt-4 mb-4">
            <form method="GET" action="{{ route('admin.rooms') }}">
                <div class="input-group">
                    <input type="text" name="name" class="form-control" placeholder="Search by name" value="{{ request()->get('name') }}">
                    <input type="number" name="price_min" class="form-control" placeholder="Min price" value="{{ request()->get('price_min') }}" step="0.01">
                    <input type="number" name="price_max" class="form-control" placeholder="Max price" value="{{ request()->get('price_max') }}" step="0.01">
                    <select name="type" class="form-control">
                        <option value="">Select type</option>
                        @foreach($roomTypes as $type)
                            <option value="{{ $type }}" {{ request()->get('type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                        <a href="{{ route('admin.rooms') }}" class="btn reset-btn">Reset Filters</a>
                    </div>
                </div>
            </form>
        </div>

        <h2 class="mb-4">Room List</h2>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->type }}</td>
                        <td>€{{ number_format($room->price_per_night, 2, ',', '.') }}</td>
                        <td>
                            @if($room->image_url)
                                <img src="{{ asset($room->image_url) }}" alt="Room's Image" class="room-image">
                            @else
                                <span class="no-image">No image</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.rooms.edit', $room->id) }}" class="btn btn-edit btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <form action="{{ route('admin.rooms.delete', $room->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
