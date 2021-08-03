<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app" class="successful my-container-flex">
        <div class="filler"></div>
        <h1>ORDINE EFFETTUATO CON SUCCESSO!</h1>
        <p>Ordine #{{ $order->id }}</p>
        <p>Indirizzo: {{ $order->delivery_address }}</p>
        <p>Tempo stimato di arrivo: 10 minuti</p>
        <div>
            <a href="{{ route('welcome') }}">Ritorna alla pagina iniziale</a>
        </div>
    </div>
</body>

</html>
