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

        .header-logo {
            background-image: url('images/AGRIMAR (1) (3).ico');
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

        * {
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
                  transition: 0.5s;
                  height: 80px;">


            <div class="container-fluid">

                <a class="navbar-brand" href="#" style="font-weight: bold; "><i><img
                            src="{{ asset('images/AGRIMAR (1) (3).ico') }}" style="margin-right: 10px;" width="60"
                            height="60" alt=""></i>Agrimar</a>
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
                            <a class="nav-link rounded-pill" href="{{ route('products') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-pill" href="#">Categories</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="{{ route('products.search') }}" method="GET">
                        <input class="form-control me-2 rounded-pill" type="search" placeholder="Search" name="query"
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
                            <li><a class="dropdown-item" href="{{ route('profile') }}">user profile</a></li>
                            <li><a class="dropdown-item" href={{ route('products.index') }}>my products</a></li>
                            <li><a class="dropdown-item" href="{{ route('seller.orders') }}">orders to dilliver</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.orders') }}">my orders</a></li>
                            <li><a class="dropdown-item" href={{ route('messages.index') }}> chats</a>
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

    <hr class="my-5">

    <div >
        <div style="padding-left: 100px ; ">
            <h3 class="bold">Follow us on social media</h3>
        </div>


        <div class="d-flex justify-content-center"  >
            <div style="padding-left: 50px">
                <a href="https://www.facebook.com" target="_blank"><i class="bi bi-facebook"
                        style="font-size: 30px; color: blue;"></i></a>

            </div>

            <div style="padding-left: 50px">
                <a href="https://www.twitter.com" target="_blank"><i class="bi bi-twitter-x"
                        style="font-size: 30px; color: rgb(0, 0, 0);"></i></a>
            </div>

            <div style="padding-left: 50px">
                <a href="https://www.instagram.com" target="_blank"><i class="bi bi-instagram"
                        style="font-size: 30px; color: #e1306c;"></i></a>
            </div>

            <div style="padding-left: 50px">
                <a href="https://www.linkedin.com" target="_blank"><i class="bi bi-linkedin"
                        style="font-size: 30px; color: #0A66C2;"></i></a>
            </div>
        </div>
        <br>


    </div>



    @yield('js')

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


</body>

</html>
