@extends('layouts.app')
@section('content')
    <a href="{{ route('orders.index') }}">Indietro</a>
    <h1>{{ $order->customer_name }} - {{ $order->id }}</h1>
    <ul>
        @foreach ($order->dishes as $dish)
            <li>{{ $dish->name }} || {{ $dish->price }}€</li>
        @endforeach
    </ul>
@endsection
