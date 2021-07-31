@extends('layouts.app')
@section('content')

    @if (count($errors->all()) > 0)
        @foreach ($errors->all() as $error)
            <h5>{{ $error }}</h5>
        @endforeach
    @endif

    <a href="{{ route("welcome") }}">Indietro</a>

    <form action="{{ route('payment') }}" method="post">
        @csrf


        <div v-for="dish in dishes" :key="dish.id">
            prova
        </div>

        @foreach ($dishes as $dish)

            @if($dish->visibility == 1)
            
            <display-div> </display-div>
                <input type="checkbox" class=""> 
             <span>   {{$dish->name}} </span>  
                <input
                name="dishes[{{$dish->id}}]" {{--colleziona gli esatti id che vanno sincronizzati anzichè tutti--}}
                type="number"
                placeholder="quantity">
           
            @endif


        @endforeach

        <input type="hidden" name="restaurant_id" value="{{$dishes[0]->user_id}}">

        <div>
            <input type="submit" value="ordina">
        </div>
    </form>

   

@endsection
