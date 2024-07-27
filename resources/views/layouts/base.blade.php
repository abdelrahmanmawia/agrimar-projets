<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- Latest compiled and minified CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @yield('css')
    <style>
        :root {
            --green-color: #3cb815;
            --light-green-color: #c0eb7b;
            --orange-color:
            --light-orange-color: #ff7e00;
            --text-color: #1a2428;
            --bg-color: #ddead1;
        }

        .collapse a {
            font-size: 1rem;
            font-weight: 500;
            color: var(--text-color);
            padding: 0.5rem 1rem;
        }

        .collapse a:hover {
            background: var(--green-color);
            border-radius: 5rem;
            color: var(--bg-color);
            transition: background 0.5s;
        }
        *{
            font-family: 'Montserrat', sans-serif;

        }
    </style>
</head>

<body style="background-color: #e3f2fd">
    <header class="position-fixed top-0 z-3 w-100">
        {{-- navbar --}}
        <nav class="navbar navbar-expand-lg"
            style="background-color: #e3f2fd;
                  box-shadow: 0 8px 11px rgb(14 15 54 / 15%);
                  padding: 20px 100px ;
                  transition: 0.5s;">

            <div class="container-fluid">

                <a class="navbar-brand" href="#" style="font-weight: bold; "><i
                        class="bi bi-tree-fill"></i>Agrimar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 " style=" column-gap: 0.5rem; ">
                        <li class="nav-item">
                            <a class="nav-link rounded-pill " aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-pill" href="{{ route('products.index')}}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-pill" href="#">Categories</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2 rounded-pill" type="search" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-outline-success rounded-circle" type="submit"><i
                                class="bi bi-search"></i></button>
                    </form>
                    <div style="color: #ddead1">||</div>
                    <div class="profile nav-item dropdown">

                        <a class="nav-link dropdown-toggle border rounded-pill border-success" href="#"
                            id="dropdownMenuelink" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                            aria-haspopup="true">
                            <i class="bi bi-person-circle"></i>
                        </a>
                        <ul class="dropdown-menu ">
                            <li><a class="dropdown-item" href="/login">user profile</a></li>
                            <li><a class="dropdown-item" href={{ route('products.index')}}>my products</a></li>
                            <li><a class="dropdown-item" href="#">Customer Service</a></li>
                            <li><a class="dropdown-item" href="/cart"><i class="bi bi-cart-fill"></i> Cart (0)</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Log Out</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')

    </main>

    @yield('js')

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>


</body>

</html>
