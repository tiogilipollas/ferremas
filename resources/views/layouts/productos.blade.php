<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferretería FERREMAS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        .card-img-top {
            object-fit: cover;
            height: 250px; 
        }
    </style>
</head>
<body>
    <div id="overlay"></div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light custom-navbar">
        <div class="container">
            <div class="text-center">
                <a href="{{ url('/inicio') }}">
                    <img src="{{ asset('img/logo_ferremas_transparente.png') }}" style="width: 80px;" alt="logo">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                    </li>
                @else
                <li class="nav-item">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <img src="{{ asset('img/user_login.png') }}" style="width: 40px;" alt="logo">
                        <a class="nav-link ml-2" href="{{ route('login') }}">{{ Auth::user()->name }}</a>
                    </div>
                </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Cerrar sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
                    <button type="button" id="cart-button" class="btn btn-success position-relative">
                        <i class="fas fa-shopping-cart"></i>
                    <span id="cart-count-badge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
                    </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <aside id="cart" class="cart-panel">
    <div id="cart-header">
        <h2>Mi carro</h2>
        <p id="cart-count">0 productos</p>
    </div>
    <div id="cart-items-container">
        <div id="cart-items">
        </div>
    </div>
    <div id="cart-footer">
        <p id="cart-total">Total: $0</p>
        <button type="button" id="buy-now" class="btn btn-success" onclick="window.location.href='{{ route('pago') }}'">Comprar ahora</button>
        <button type="button" id="go-to-cart" class="btn btn-secondary">Ir al carro de compras</button>
    </div>
</aside>


    @yield('content')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/carrito.js') }}"></script>

</body>
</html>