<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room - Backoffice</title>
    <!-- Import Bootstrap CSS and Font Awesome -->
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
        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .form-container h2 {
            margin-bottom: 20px;
            font-size: 1.75rem;
            color: #007bff;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 5px;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }
        .form-group select {
            background-color: #ffffff;
        }
        .form-group #new-type-container {
            display: none;
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
        <h1>Edit Room</h1>
    </div>

    <div class="container">
        <a href="{{ route('admin.logout') }}" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
        
        <button onclick="window.history.back();" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </button>


        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container">
                    <h2 class="text-center">Edit Room</h2>
                    <form method="POST" action="{{ route('admin.rooms.update', $room->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Room Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $room->name) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $room->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="type">Room Type:</label>
                            <select class="form-control" id="type" name="type">
                                @foreach($roomTypes as $type)
                                    <option value="{{ $type }}" {{ old('type', $room->type) == $type ? 'selected' : '' }}>{{ $type }}</option>
                                @endforeach
                                <option value="other">Other (Enter a new type)</option>
                            </select>
                        </div>
                        <div class="form-group" id="new-type-container">
                            <label for="new_type">New Room Type:</label>
                            <input type="text" class="form-control" id="new_type" name="new_type" value="{{ old('new_type') }}">
                        </div>
                        <div class="form-group">
                            <label for="price_per_night">Price per Night (€):</label>
                            <input type="number" class="form-control" id="price_per_night" name="price_per_night" value="{{ old('price_per_night', $room->price_per_night) }}" step="0.01" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Import Bootstrap JavaScript and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#type').change(function () {
                if ($(this).val() === 'other') {
                    $('#new-type-container').show();
                    $('#new_type').attr('required', true);
                } else {
                    $('#new-type-container').hide();
                    $('#new_type').attr('required', false);
                }
            });
        });
    </script>
</body>
</html>
