<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>AFT.PSC</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('font_end/image/aft_logo_mini2.png') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=K2D:wght@400;600;700&display=swap">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('font_end/css/styles.css') }}" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <style>
        .jumbotron {
            background-color: #8b0000;
            color: #ffffff;
        }

        .colors {
            background-color: #0595FB;
            color: #ffffff;
        }

        .fontgoogle {
            font-family: "K2D", sans-serif;
            font-size: 17px;
        }
    </style>
</head>

<!-- Navigation-->
<nav class="navbar navbar-expand-lg text-uppercase fixed-top jumbotron" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('font_end/image/aft_logo_mini.png') }}" alt="">
            AFT.PSC
        </a>
        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
            aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('login') }}">
                        <img src="{{ asset('font_end/image/user.png') }}" alt="">
                        Admin
                    </a>
                </li>
                <!-- <li class="nav-item mx-0 mx-lg-1">-->
                <!--    <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('register') }}">-->
                <!--        <img src="{{ asset('font_end/image/registered.png') }}" alt="">-->
                <!--        Register-->
                <!--    </a>-->
                <!--</li>-->
            </ul>
        </div>
    </div>
</nav>

<body id="page-top">
