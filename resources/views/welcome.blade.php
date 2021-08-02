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
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}

    {{-- link cli vue --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div id="app">
        <div>
            <div class="relative">
                <img src="img/home-background-hero-scaled.jpg" alt="" class="full">

                <div class="wrapper absolute top-final">
                    <header>
                        <div class="flex between">
                            <div class="payoff flex column">
                                <div class="three">
                                    <h1 class="white">Delive<span class='inline-block'><h1 class="primary">Boo</h1></span></h1>
                                </div>
                            </div>
                            <div class='row'>
                                @if (Route::has('login'))
                                    <div class="top-right links col-12-sm">
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
                        <div class="two primary">
                            <h1 class="primary">Great food</h1>
                        </div>
                        <div class="three">
                            <h1 class="white">Delivered</h1>
                        </div>
                    </div>                    
                </div>
                <div class="container">
                    <div class="m-top-20 flex row-between mb-5">
                         <h1 class="$tertiary">Restaurant Types</h1>
                    </div>
                    <div >
                        <restaurants-index></restaurants-index>
                    </div>
                </div>
            </div>

            <footer>                
            <div class="relative">
                <img src="img/footer-background-scaled.jpg" alt="">
                <div class="wrapper absolute top-final flex white top-20">
                    <div class="flex column full">
                        <div class="flex between full">
                            <div>
                                <h2 class="white">Download our</h2>
                                <h1 class="primary">Ordering App</h1>
                            </div>
                            <div>
                                <ul class="lastul">                                    
                                    <li><a class="lilbox" href=""><img class="box-img" src="img/app-store-badge.png"
                                                alt=""></a></li>
                                    <li><a class="lilbox" href=""><img class="box-img" src="img/badge-playstore.png"
                                                alt=""></a></li>                                    
                                </ul>
                            </div>          
                        </div>                          
                        <div class="text-center">
                            <h6><span class="primary">© Copyright 2012 - 2020 | DeliveBoo Theme by</span><span class="white">
                                    DeliveBoo Fusion
                                </span><span class="primary">| All Rights Reserved | Powered By</span><span
                                    class="white"> Team Heroes</span></h6>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            </footer> 
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
