<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro do Cliente</title>
    <!-- Importar CSS do Bootstrap e Font Awesome -->
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
            height: 50vh; /* Ajustar altura para a página de cadastro */
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
        .card {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 30px; /* Espaçamento para evitar sobreposição com o menu */
        }
        .btn-primary {
            background-color: #ff6f61;
            border-color: #ff6f61;
        }
        .btn-primary:hover {
            background-color: #ff5a4d;
            border-color: #ff5a4d;
        }
        .navbar-light .navbar-nav .nav-link {
            color: #333;
        }
        .navbar-brand {
            font-weight: bold;
            color: #333;
        }
        .navbar-light .navbar-toggler {
            border-color: rgba(0, 0, 0, 0.1);
        }
        .navbar-toggler-icon {
            background-color: #333;
        }
    </style>
</head>
<body>

    @include('components.navbar')

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-text">
            <h1>Bem-vindo ao Registro de Clientes</h1>
            <p>Crie sua conta para continuar</p>
        </div>
    </div>

    <!-- Formulário de Registro -->
    <div class="container spacing">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background:none">
                        <h4 class="mb-0">Registro do Cliente</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('client.signup.submit') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nome:</label>
                                <input type="text" class="form-control" name="name" placeholder="Digite seu nome" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" placeholder="Digite seu email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Telefone:</label>
                                <input type="text" class="form-control" name="phone" placeholder="Digite seu telefone" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Senha:</label>
                                <input type="password" class="form-control" name="password" placeholder="Digite sua senha" required>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirme a Senha:</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirme sua senha" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('components.footer')


    <!-- Importar JavaScript do Bootstrap e dependências -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
