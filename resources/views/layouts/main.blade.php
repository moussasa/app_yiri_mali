<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="L'application de vente de Yiri-Mali">
    <link rel="icon" href="{{ asset('images/yiri_mali_logo.png') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Yiri-Mali</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"  >

    <link rel="stylesheet" href="{{ asset('css/layouts_main.css') }}">
    @stack('css')
    @livewireStyles

</head>

<body>

    {{-- scroll top --}}
    <div class="scrolltop">
        <i class="fa-solid fa-arrow-up"></i>
    </div>

    {{-- navbar --}}
    <nav class="nav">
        <div class="logo">
            <a href="{{ route('main') }}">
                <img src="{{ asset('images/yiri_mali_logo.png') }}" alt="Logo de Yiri-Mali">
            </a>
        </div>


        <label for="menu_chk">
            <input style="display: none;" type="checkbox" id="menu_chk">
            <i id="menu" class="fa-solid fa-bars"></i>


            <ul>
                <li style="--i:1;"><a href="{{ route('main') }}">Accueil</a></li>
                <li style="--i:2;"><a href="#">Formation</a></li>
                <li style="--i:3;"><a href="#">Maintenance</a></li>
                <li style="--i:4;"><a href="{{ route('user.login') }}">Connection</a></li>
            </ul>
        </label>
        <input type="text" name="search" wire:model="search" id="search" placeholder="Rechercher...">


    </nav>

    {{-- section dynamique --}}

    <section>
        @yield('dynamique')
    </section>



    {{-- footer --}}
    <footer>
        <section class="about">
            <h2>A propos</h2>
            <div class="img">
                <img src="{{ asset('images/yiri_mali_logo.png') }}" alt="Logo">
            </div>
            <p>
                Nous sommes une entreprise spécialisée dans les domaines suivants:
            </p>
            <p>
                développement des applications (web, mobile), la maintenance, la formation en informatique, Vente
                d'ordinateur, l’illustration, le montage vidéo et plein de d'autre
            </p>
           <span>
            <a href="#">
                <i class="bi bi-facebook"></i>
            </a>
            <a href="#">
                <i class="bi bi-envelope-check"></i>
            </a>
            <a href="#">
                <i class="bi bi-messenger"></i>
            </a>
            <a href="#">
                <i class="bi bi-whatsapp"></i>
            </a>
           </span>
        </section>

        <section class="contact">

            <h2>Réseaux</h2>
            <p>
                <a href="#"><i class="bi bi-telephone-forward"></i></a>
                <span>+223 70666667</span>
            </p>

            <p>
                <a href="mailto:mm@gmail.com"> <i class="bi bi-envelope-at-fill"></i></a>
                <span>YIRI-MALI@gmail.com</span>
            </p>
            <p>
                <a href="www.facebook.com"> <i class="bi bi-browser-edge"></i></i></a>
                <span>Yirimali.com</span>
            </p>


        </section>


    </footer>
    <section class="copyright">
        <p>Copyright &copy; 2023-{{ date('Y') }} by Yiri-Mali</p>
    </section>
    @livewireScripts
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        >
    </script>
    <script>
        const active_scrolltop = document.querySelector('.scrolltop');
        window.addEventListener('scroll', function() {
            active_scrolltop.classList.toggle('scrolltop_active', window.scrollY > 100);
        })

        active_scrolltop.addEventListener('click', function() {
            document.documentElement.scrollTop = 0
        })

        let links = document.querySelectorAll('nav ul li a')

        links.forEach(element => {
            if (element.href == document.URL) {
                element.classList.toggle('active')
            }
        });
    </script>

</body>

</html>