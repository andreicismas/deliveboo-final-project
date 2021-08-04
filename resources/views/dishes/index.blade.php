@extends('layouts.app')
@section('content')
<div class="for-the-nav">

    <div class="container dishes index">
        <a href="{{route("home")}}">Indietro</a>
        @if(count($dishes) == 0)
                    <h3>Non ci sono piatti da mostrare,
                        <a href="{{route('dishes.create')}}">aggiungi un piatto</a>
                    </h3>
                </div>  
            </div>   
        @else
            @foreach($dishes as $dish)
                <div class="dish-card">
                    <h2>{{$dish->name}} </h2>
                    <h5><span>Ingredienti:</span> {{$dish->ingredients}} </h5>

                        @if(strlen($dish->description) > 30)
                        <h5> <span>Descrizione:</span> {{ substr($dish->description, 0, 25)."..."}} </h5>
                        @else
                        <h5> <span>Descrizione:</span> {{ $dish->description }} </h5>
                        @endif
                    
                    <h5><span>Prezzo:</span> {{$dish->price}} Euro</h5>

                    @if($dish->visibility == 1)
                        <h5 class="visibility"><em>Visibile nel menù</em></h5> 
                    @elseif($dish->visibility == 0)
                        <h5 class="visibility"><em>Non visibile nel menù</em></h5> 
                    @endif

                    <a href="{{ route('dishes.show', [ "dish" => $dish->id, "resource" => "dishes" ])}}" class="btn btn-primary"> Leggi tutto </a> 
                    <a href="{{ route('dishes.edit', ['dish' => $dish->id]) }}" class="btn btn-primary"> Modifica </a> 
                @include('layouts.deleteBtn', [ "id" => $dish->id, "resource" => "dishes" ])
                
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection