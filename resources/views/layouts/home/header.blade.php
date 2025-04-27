<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PT IDARMA DIGITAL TECHNOLOGY</title>
    <meta name="description"
        content="IDarma Digital adalah startup teknologi digital yang berfokus pada solusi inovatif untuk mengatasi tantangan masyarakat di era digital. Kami menyediakan layanan efektif, efisien, dan berdampak positif bagi usaha kecil, usaha besar, dan masyarakat luas.">
    <meta name="keywords"
        content="IDarma Digital, Startup Teknologi, Solusi Digital, Inovasi Digital, Layanan Teknologi, Digitalisasi UMKM, Digitalisasi Bisnis, Transformasi Digital, Teknologi untuk Masyarakat, Solusi Inovatif, Era Digital">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logo_idtech.png') }}" rel="icon">
    <link href="{{ asset('assets/img/logo_idtech.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/logo_idtech.png') }}" alt="">
                <h1 class="sitename">Idarma</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ url('/') }}#hero">Home</a></li>
                    <li><a href="{{ url('/') }}#vision-mission">Visi & Misi</a></li>
                    <li><a href="{{ url('/') }}#services">Servis</a></li>
                    <li><a href="{{ url('/') }}#organizations">Organisasi</a></li>
                    <li><a href="{{ url('/') }}#portfolio">Portfolio</a></li>
                    <li>
                        <a href="{{ route('news') }}"
                            class="{{ request()->is('news') || request()->is('news/*') ? 'active' : '' }}">
                            Berita
                        </a>
                    </li>
                    <li><a href="{{ url('/') }}#contact">Kontak</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>
