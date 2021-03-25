<h1>Busca por Hotel</h1>
<form action="filterHotel" method="post">
  <p>Seleciona una Hotel:
    <select name="select_brand">
        {foreach from=$hotel item=hotel}
          {if $hotel->id_Hotel == $hotel_id}
            <option selected="{$hotel->id_Hotel}" value="{$hotel->id_Hotel}">{$hotel->Hotel}</option>
          {else}
            <option value="{$hotel->id_Hotel}">{$hotel->Hotel}</option>
          {/if}
        {/forehotel}
    </select>
    <button class="btn" type="submit">filtrar</button>
  </p>
</form>