
<form action ="{{route('dishes.store')}}" method="post"> 
    @csrf 

        <div>
         <textarea name="name" class="form-control" aria-label="With textarea" rows="1" style="resize: none" placeholder="Nome piatto"></textarea>
        </div>  

        <div>               
         <textarea name="ingredients" class="form-control" aria-label="With textarea" rows="3" placeholder="Ingredienti"></textarea>
        </div>

        <div>  
         <textarea name="description" class="form-control" aria-label="With textarea" rows="6" placeholder="Breve descrizione"></textarea>
        </div>

        <div>  
         <textarea name="price" class="form-control" aria-label="With textarea" rows="1" style="resize: none" placeholder="Prezzo"></textarea>
        </div>

        <div>
            <label>Disponibilità</label>  <br>
            <input type="radio" value=1 id="" name="visibility">
            <label for="1">Immediata</label> <br>
            <input type="radio" value=0 id="" name="visibility">
            <label for="0">Rendi disponibile più avanti</label>  
        </div>

    <div>
      <input type="submit" value="carica">
    </div>
  
         
</form>