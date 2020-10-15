<p>Filtrar por hotel:</p>
    <form action="habsporhotel" method="POST">
        <select name="idHotel">
                
        {foreach from=$hoteles item=hotel}
            <option value={$hotel->id_hotel} >{$hotel->nombre} </option>
        {/foreach}
    
        </select>
    <button type="submit">Filtrar</button>
    </form>