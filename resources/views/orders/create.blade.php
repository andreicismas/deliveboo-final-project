@extends('layouts.app')
@section('content')



        @if (count($errors->all()) > 0)
            @foreach ($errors->all() as $error)
                <h5>{{ $error }}</h5>
            @endforeach
        @endif


        <form action="{{ route('payment') }}" method="post">
            @csrf

        <div class="cart-head">
            <a href="{{ route("welcome") }}">Indietro</a>
            <input  class="submit" type="submit" value="ordina">
        </div>


   
         
            @foreach ($dishes as $dish)
                @if($dish->visibility == 1)
                

                <div class="display-dish">
                    {{--<input type="checkbox" class=""> 
                    <span>{{$dish->name}} </span>  --}}
                    <input class="button-form"
                    name="dishes[{{$dish->id}}]" {{--colleziona gli esatti id che vanno sincronizzati anzichè tutti--}}
                    type="number"
                    placeholder="quantity">


                 </div>
                @endif
            @endforeach

    
            <input type="hidden" name="restaurant_id" value="{{$dishes[0]->user_id}}">

          
        </form>


@endsection
