<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravell</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
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

            .links > a {
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

        {{-- link cli vue --}}
        <script src="{{ asset('js/app.js') }}" defer></script>


    </head>
    <body>
        <div id="app" class="flex-center position-ref full-height">
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
            
            <div class="align-self-start ">

                 <h1>Scegli il tuo ristorante </h1>

                @foreach ($types as $type)
                    <type-button
                     name= "{{$type->name}}"
                    ></type-button>

                @endforeach
            
            
                 @foreach ($users as $user)
                 <div class="d-flex flex-row">

                    <div class="card" style="width: 18rem;">
                        {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                        <div class="card-body">
                            <h5 class="card-title">Nome UR - {{$user->name}}</h5>
                            <em class="card-title">Email UR -  {{$user->email}}</em>
                            <em class="card-title">indirizzo  UR -  {{$user->address}}</em>
                        </div>
                    </div>
                 </div>

                        {{-- <h1>{{$user->name}}</h1>
                        <h1>{{$user->email}}</h1>
                          <h1>{{$user->VAT}}</h1>
                         <h1>{{$user->adress}}</h1> --}}
                 @endforeach
            </div>

            

                
        
                 

            
        </div>
    </body>
</html>
