@if(count($dishes) == 0)
    <div class="container">
            <h3>Non sono stati inseriti piatti
                <a href="{{route('dishes.create')}}">Aggiungi un piatto</a>
            </h3>
        </div>  
    </div>   
@else
    @foreach($dishes as $dish)
            <h2>Nome: {{$dish->name}} </h2>
            <h5>Ingredienti: {{$dish->ingredients}} </h5>
            <h5>Descrizione: {{$dish->description}} </h5>
            <h5>Prezzo: {{$dish->price}} Euro</h5>

            @if($dish->visibility == 1)
                 <h5>Visibile nel menù</h5> 
            @elseif($dish->visibility == 0)
                <h5>Non visibile nel menù</h5> 
            @endif

        <a href="{{ route('dishes.edit', ['dish' => $dish->id]) }}" class="btn btn-primary"> Modifica </a> 
          
    @endforeach
@endif