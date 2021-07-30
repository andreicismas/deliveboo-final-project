<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

    </style>
    {{-- link boostrap --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{-- link cli vue --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div id="app">
        <div class="container">
            <div class="relative">
                <img src="img/home-background-hero-scaled.jpg" alt="" class="full">

                <div class="wrapper absolute top-final">
                    <header>
                        <div class="navbar flex between">
                            <div class="payoff  flex column">
                                <div class="three">
                                    <h1 class="white">DeliveBoo</h1>
                                </div>
                            </div>
                            <div>
                                @if (Route::has('login'))
                                    <div class="top-right links">
                                        @auth
                                            <a href="{{ url('/home') }}">Home</a>
                                        @else
                                            <a href="{{ route('login') }}">Login</a>
                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}">Register</a>
                                            @endif
                                        @endauth
                                    </div>
                                @endif
                            </div>
                        </div>
                    </header>
                    <div class="payoff absolute flex column">
                        <div class="one">
                            <h3 class="white">Hungry?</h3>
                        </div>
                        <div class="two yellow">
                            <h1 class="yellow">Great food</h1>
                        </div>
                        <div class="three">
                            <h1 class="white">Delivered</h1>
                        </div>
                        <div class="four"><a class="order" href="#">VIEW OUR RESTAURANTS TYPES</a></div>
                        
                        
                    </div>
                    
                </div>
                <div>
                    <div class="flex row-between mb-5">
                         <h1>Restaurant Types</h1><a class="order" href="#">VIEW THE FULL RESTAURANT LIST</a>
                    </div>
                    <div>
                        <restaurants-index></restaurants-index>
                    </div>
                </div>
            </div>
            <div class="wrapper">
                <div class="flex row-between">
                    <h1>Restaurant Categories</h1><a class="order" href="#">VIEW THE FULL RESTAURANT LIST</a>
                </div>
                <div class="big-box flex">
                    <div class="box"><img class="img-box relative" src="img/appetizers-menu-background.jpg" alt="">
                        <h1 class="none">prova</h1>
                    </div>
                    <div class="box"><img class="img-box" src="img/pancake-burger-200x150.jpg" alt=""></div>
                    <div class="box"><img class="img-box" src="img/pizza-menu-background.jpg" alt=""></div>
                    <div class="box"><img class="img-box" src="img/skin-on-fries-200x286.jpg" alt=""></div>
                    <div class="box"><img class="img-box" src="img/sides-menu-background.jpg" alt=""></div>
                    <div class="box"><img class="img-box" src="img/donut-burger-200x286.jpg" alt=""></div>
                    <div class="box"><img class="img-box" src="img/new-milkshake-menu-200x150.jpg" alt=""></div>
                    <div class="box"><img class="img-box" src="img/specials-menu-background.jpg" alt=""></div>
                </div>
            </div>                      
            <div class="relative">
                <img src="img/footer-background-scaled.jpg" alt="" class="full">
                <div class="wrapper absolute top-final flex white top-20">
                    <div class="flex column full">
                        <div class="flex between full bottom-50">
                            <div>
                                <ul class="lastul">
                                    <li>HOMEPAGE</li>
                                    <li class="m-top-20"><a class="yellow decnone" href="#">Tipologie ristoranti </a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <ul class="lastul">
                                    <li>PAGINA MENù RISTORATORE PUBBLICA</li>
                                    <li class="m-top-20"><a class="decnone white" href="#">Menù</a></li>
                                    <li><a class="decnone white" href="#">Cibi</a></li>
                                    <li><a class="decnone white" href="#">Quantità</a></li>
                                </ul>
                            </div>
                            <div>
                                <ul class="lastul">
                                    <li>PAGINA CARRELLO/CHECKOUT</li>
                                    <li class="m-top-20"><a class="decnone white" href="#">modifica quantità cibi</a>
                                    </li>
                                    <li><a class="decnone white" href="#">Inserisci carta di credito</a></li>
                                    <li><a class="lilbox" href=""><img class="box-img" src="img/app-store-badge.png"
                                                alt=""></a></li>
                                    <li><a class="lilbox" href=""><img class="box-img" src="img/app-store-badge.png"
                                                alt=""></a></li>
                                </ul>
                            </div>
                            <div>
                                <ul class="lastul">
                                    <li>DASHBOARD UTENTE REGISTRATO</li>
                                    <li>Pagina Lista Piatti</li>
                                    <li>Pagina Piatto</li>
                                    <li>Pagina Lista Ordini Ricevuti</li>
                                    <li>Pagina Statistiche Ordini</li>
                                </ul>
                            </div>
                        </div>
                        <div class="logo text-center">
                        </div>
                        <div class="loop text-center">
                            <h1 class="yellow">Stay In The Loop</h1>
                            <p class="white">Sign up to receive up to date news and offers directly in your inbox:</p>
                            <input class="email" type="text" placeholder="you@email.com"><br>
                            <a class="special order" href="#">SUBSCRIBE</a>
                            <h6><span class="yellow">© Copyright 2012 - 2020 | Avada Theme by</span><span class="white">
                                    Theme Fusion
                                </span><span class="yellow">| All Rights Reserved | Powered By</span><span
                                    class="white"> Wordpress</span></h6>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <nav></nav>
   

        <div>
        <img class="img-fluid" src="{{ asset('img/donut-burger.jpg') }}" alt="">
            <h1>Scegli il tuo ristorante </h1>
            <span class="badge badge-primary">Primary</span>
<span class="badge badge-secondary">Secondary</span>
<span class="badge badge-success">Success</span>
<span class="badge badge-danger">Danger</span>
<span class="badge badge-warning">Warning</span>
<span class="badge badge-info">Info</span>
<span class="badge badge-light">Light</span>
<span class="badge badge-dark">Dark</span>

        <restaurants-index></restaurants-index>
        
        </div>
    </div> --}}
</body>

</html>
