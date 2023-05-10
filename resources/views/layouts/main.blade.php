<!DOCTYPE html>
<html lang="{{str_replace('_','-',app()->getLocale())}}">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="L'application de vente de Yiri-Mali">
    <link rel="icon" href="{{asset('images/yiri_mali_logo.png')}}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yiri-Mali</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            --bg-nav: rgb(38, 190, 157);
        }

        nav {
            position: sticky;
            top: 0;
            width: 100%;
            height: 70px;
            background-color: var(--bg-nav);
            display: flex;
            justify-content: space-between;
            box-shadow: 0 0 13px rgba(0, 0, 0, 0.3);
            z-index: 100;
        }

        nav .logo {
            width: 60px;
            height: 100%;
        }

        nav .logo img {
            width: 100%;
            height: 100%;
            object-fit: fill;
        }

        nav ul {
            line-height: 70px;
        }

        nav ul li {
            display: inline-block;
            padding: 0 10px;
            margin: 0 5px;
            list-style-type: none;
            animation: anime_nav_ul 2s forwards;
            animation-delay: calc(.3s * var(--i));
            opacity: 0;
        }

        @keyframes anime_nav_ul {
            0% {
                transform: translateY(100px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        nav ul li a {
            color: white;
            padding: 10px;
            text-decoration: none;
            border-radius: 12px;
            background-color: rgba(0, 0, 0, 0.2);
            font-size: 19px;
        }

        nav ul li a:hover {
            background-color: rgba(205, 231, 37, 0.935);
        }

        nav ul li .active {
            background-color: rgba(205, 231, 37, 0.935);
        }

        #menu {
            position: absolute;
            font-size: 30px;
            color: white;
            padding: 10px;
            top: 10px;
            right: 10px;
            display: none;
        }

        #search {
            margin: 20px;
            border-radius: 5px;
            height: 30px;
            padding: 10px;
            border: none;
        }

        footer {
            width: 100%;
            height: auto;
            padding: 10px;
            margin-top: 2vh;
            box-shadow: 10px 0 0 0 rgba(0, 0, 0, 0.3);
            background-color: var(--bg-nav);
            display: flex;
            color: white;
        }

        footer section {
            margin-top: 2vh;
            flex: 1;
            text-align: center;
            padding: 5px;
            font-size: 19px;
        }

        footer section h1 {
            text-transform: uppercase;
            font-family: sans-serif;
            letter-spacing: 2px;
            position: relative;
            padding-bottom: 2px;
        }


        footer section img {
            width: 30%;
            height: 20vh;
        }

        footer section li {
            margin-left: 10%;
            text-align: left;
            list-style-type: none;
        }

        footer .contact p {
            margin-top: 8vh;
            text-align: left;
            padding: 10px;
            display: inline-block;
        }

        footer .contact p a {
            color: white;
            text-decoration: none;
            font-size: 30px;
            padding: 5px;
            border-radius: 10px;
        }

        footer .contact p a:hover {
            background-color: #1702fd;
        }

        .copyright {
            text-align: center;
            width: 100%;
            background-color: var(--bg-nav);
        }

        .copyright p {
            text-align: center;
            width: 100%;
            padding: 5px;
            color: white;
            font-size: 19px;
            background-color: rgba(0, 0, 0, 0.2);
        }

        .scrolltop {
            position: fixed;
            right: 40px;
            bottom: 100%;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            z-index: 99;
            background-color: var(--bg-nav);
            color: white;
            font-size: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            visibility: hidden;
            transition: .4s;
        }

        .scrolltop_active {
            bottom: 40px;
            visibility: visible;
        }



        @media Screen and (max-width:850px) {

            .logo {
                display: none;
            }

            nav ul {
                position: absolute;
                top: 70px;
                width: 70%;
                height: 100vh;
                left: -100%;
                background-color: #a6a3a3;
                transition: .1s ease-in;
            }

            #menu_chk:checked~ul {
                left: 0;
            }

            #menu_chk:checked body {
                background-color: red;
            }

            nav ul li {
                display: block;
                text-align: center;
            }

            #menu {
                position: absolute;
                font-size: 30px;
                color: white;
                padding: 10px;
                top: 10px;
                left: 10px;
                display: block;
            }

            footer {
                display: flex;
                flex-direction: column;
            }

            footer section {
                width: 100%;
                text-align: center;
            }

            footer section h1 {
                border-bottom: 2px solid #000;
            }

            footer section img {
                width: 30%;
                height: 20vh;
            }



        }
    </style>
</head>

<body>

    {{-- scroll top --}}
    <div class="scrolltop">
        <i class="fa-solid fa-arrow-up"></i>
    </div>

    {{-- navbar --}}
    <nav>
        <div class="logo">
            <a href="{{route('main')}}">
                <img src="{{asset('images/yiri_mali_logo.png')}}" alt="Logo de Yiri-Mali">
            </a>
        </div>

        <label for="menu_chk">
            <i id="menu" class="fa-solid fa-bars"></i>
        </label>
        <input style="display: none;" type="checkbox" id="menu_chk">
        <ul>
            <li style="--i:1;"><a href="{{route('main')}}">Accueil</a></li>
            <li style="--i:2;"><a href="#">Formation</a></li>
            <li style="--i:3;"><a href="#">Maintenance</a></li>
            <li style="--i:4;"><a href="#">Connection</a></li>
        </ul>

        <input type="search" name="search" id="search" placeholder="Rechercher...">


    </nav>

    {{-- section dynamique --}}

    <section>
        @yield('dynamique')
    </section>



    {{-- footer --}}
    <footer>
        <section class="about">
            <h1>A propos</h1>
            <p>Yiri-Mali</p>
            <img src="{{asset('images/yiri_mali_logo.png')}}" alt="Logo">
            <p>
                Nous sommes une entreprise spécialisée dans les domaines suivants:
            </p>
            <li>développement des applications (web, mobile)</li>
            <li>la maintenance</li>
            <li>la formation en informatique</li>
            <li>Vente d'ordinateur</li>
            <li>l’illustration</li>
            <li>le montage vidéo</li>
            <li>Et plein de d'autre</li>

        </section>

        <section class="contact">

            <h1>Contacts</h1>
            <p>
                <a href="#"><i class="fas fa-globe-africa"></i></a>
            </p>
            <p>
                <a href="tel:+223 77-77-77-77"><i class="fas fa-phone-volume"></i></a>
            </p>
            <p>
                <a href="mailto:mm@gmail.com"> <i class="fas fa-envelope"></i></a>
            </p>
            <p>
                <a href="www.facebook.com"> <i class="fas fa-envelope"></i></a>
            </p>
            <p>
                <a href="www.whatsapp.com"> <i class="fas fa-envelope"></i></a>
            </p>
            <p>
                <a href="www.instagram.com"> <i class="fas fa-envelope"></i></a>
            </p>

        </section>


    </footer>
    <section class="copyright">
        <p>Copyright &copy; 2023 by Yiri-Mali</p>
    </section>
</body>

<script>
    const active_scrolltop=document.querySelector('.scrolltop');
    window.addEventListener('scroll',function(){
            active_scrolltop.classList.toggle('scrolltop_active',window.scrollY > 100);
    })
   
    active_scrolltop.addEventListener('click',function(){
        document.documentElement.scrollTop=0
    })

    let links=document.querySelectorAll('nav ul li a')

    links.forEach(element => {
        if(element.href == document.URL){
            element.classList.toggle('active')
        }
    });

</script>

</html>