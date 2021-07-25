@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('home') }}">Indietro</a>

        @if (count($orders) == 0)
            <h3>Non ci sono ordini da mostrare</h3>
        @else
            @foreach ($orders as $order)
                <h2>{{ $order->name }} </h2>
                <h4>Piatti ordinati</h4>
                <h5>{{ $order->dish_id }} </h5>

                <a href="{{ route('orders.show', ['order' => $order->id, 'resource' => 'orders']) }}" class="btn btn-primary">
                    Leggi tutto </a>
            @endforeach
        @endif
    </div>

@endsection
