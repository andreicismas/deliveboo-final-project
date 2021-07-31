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
            <a class="back-bttn" href="{{ route("welcome") }}"> < </a>

            <div class="signboard">
                <h2>{{$restaurant}}</h2>
            </div>

            <input  class="my-submit my-bttns" type="submit" value="ordina" value="#ff00ff">
        </div>
         
        @foreach ($dishes as $dish)
            @if($dish->visibility == 1)
                

            <div class="display-dish">
                    <div class="my-overlay"> <h4>{{$dish->name}}</h4> </div>

                <div class="border-box"> 

                        <div  class="description">
                            <h6><strong>Ingredienti:</strong></h6>
                            <h6>{{$dish->ingredients}}</h6>
                            <h6>{{$dish->description}}</h6>
                            <h3>{{$dish->price}} €</h3>
                        </div>

                        <div class="counter-div"> 
                            <div class="tag-counter my-bttns">
                                
                                <span onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus">+</span>
                                
                                    <input class="counter-display my-counter-input "
                                    name="dishes[{{$dish->id}}]" {{--colleziona gli esatti id che vanno sincronizzati anzichè tutti--}}
                                    type="number"
                                    placeholder="0">
                                
                                <span onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus">-</span>

                            </div>
                        </div>
                </div>
            </div>

            @endif
        @endforeach
    
        <input type="hidden" name="restaurant_id" value="{{$dishes[0]->user_id}}">
          
        </form>

@endsection
