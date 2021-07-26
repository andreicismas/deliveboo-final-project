@extends('layouts.app')
@section('content')

    @if (count($errors->all()) > 0)
        @foreach ($errors->all() as $error)
            <h5>{{ $error }}</h5>
        @endforeach
    @endif

    <a href="{{ route("welcome") }}">Indietro</a>

    <form action="{{ route('orders.store') }}" method="post">
        @csrf

        @foreach ($dishes as $dish)
            <h3>{{ $dish->name }}
                <input type="checkbox" name="dishes[]" value="{{ $dish->id }}">
            </h3>
            {{-- <input name="quantity[]" aria-label="With textarea" rows="1" style="resize: none" placeholder="quantità"> --}}
        @endforeach

        <div>
            <input name="customer_name" class="form-control" aria-label="With textarea" rows="1" style="resize: none"
                placeholder="Name">
        </div>
        <div>
            <input name="customer_phone_number" class="form-control" aria-label="With textarea" rows="1" style="resize: none"
                placeholder="Phone">
        </div>
        <div>
            <input name="customer_mail" class="form-control" aria-label="With textarea" rows="1" style="resize: none"
                placeholder="Mail">
        </div>
        <div>
            <input name="delivery_address" class="form-control" aria-label="With textarea" rows="1" style="resize: none"
                placeholder="indirizzo di consegna">
        </div>

        <div>
            <input type="submit" value="ordina">
        </div>
    </form>
@endsection
