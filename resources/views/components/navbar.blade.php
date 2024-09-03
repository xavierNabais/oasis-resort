<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oasis</title>
    <!-- Usando Bootstrap 4.6.0 e Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        /* Navbar styling */
        .navbar {
            transition: background-color 0.3s, box-shadow 0.3s, padding 0.3s;
            padding: 15px 20px;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 9999;
            background-color: transparent;
            box-shadow: none;
        }

        .navbar-brand img {
            width: 80%; /* Default size */
            transition: width 0.3s;
        }

        .navbar.scrolled .navbar-brand img {
            width: 30%; /* Reduced size on scroll */
        }

        .navbar-nav .nav-link {
            color: white!important; /* Default color */
            margin-left: 20px;
            font-size: 1rem;
            font-weight: 500;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .navbar.scrolled .navbar-nav .nav-link {
            color: #333!important; /* Color on scroll */
        }

        .navbar-nav .nav-link:hover {
            color: #ff6f61;
            transform: scale(1.1);
        }

        .navbar-toggler {
            border: none;
            outline: none;
        }

        .navbar-toggler-icon {
            color: #333;
        }

        .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            margin-right: 10px;
        }

        .dropdown-menu {
            right: 0;
            left: auto;
            background-color: #fff;
            border-radius: 0;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
        }

        .dropdown-item:hover {
            background-color: #ff6f61;
            color: white;
        }

        .navbar.scrolled {
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .content {
            padding-top: 70px; /* Adjust this to ensure content is not hidden behind the navbar */
        }
    </style>
</head>
<body>

    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="/"><img src="https://i.ibb.co/JQDNJNQ/imagem-2024-08-31-024050135-removebg-preview.png" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/rooms">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hello, {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="/profile">Profile</a>
                            <a class="dropdown-item" href="{{ route('client.logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('client.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.login') }}">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>


    <!-- Script tags should be included just before the closing </body> tag -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script>
        // JavaScript to handle the navbar background change on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>
