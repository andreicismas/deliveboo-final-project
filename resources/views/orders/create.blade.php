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

            <div class="signboard">
                <h2>{{$restaurant}}</h2>
            </div>

            <input  class="submit" type="submit" value="ordina">
        </div>


   
         
            @foreach ($dishes as $dish)
                @if($dish->visibility == 1)
                

                <div class="display-dish">
                    {{--<input type="checkbox" class=""> --}}

                    <div  class="description">
                        <h6>{{$dish->ingredients}}<h6>
                       <h6>{{$dish->description}}<h6>
                    </div>
                    <div class="my-counter">  
                        <input class="my-input"
                        name="dishes[{{$dish->id}}]" {{--colleziona gli esatti id che vanno sincronizzati anzichè tutti--}}
                        type="number"
                        placeholder="Quantità">
                    </div>

                </div>
                @endif
            @endforeach

    
            <input type="hidden" name="restaurant_id" value="{{$dishes[0]->user_id}}">

          
        </form>


@endsection
