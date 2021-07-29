@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('home') }}">Indietro</a>

        @if (count($orders) == 0)
            <h3>Non ci sono ordini da mostrare</h3>
        @else
        <table>
            <thead>
                <th>ID Ordine</th>
                <th>Nome Cliente</th>
                <th>Indirizzo Cliente</th>
                <th>Totale</th>
            </thead>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->delivery_address }}</td>
                <td>{{ $order->payment_amount }}</td>
                <td><a href="{{ route('orders.show', ['order' => $order->id]) }}">Leggi tutto</a></td>
            </tr>
            @endforeach
        </table>
        @endif
    </div>

@endsection
