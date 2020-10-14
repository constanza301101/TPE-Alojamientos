{include file="header.tpl"}
{include file="navbar.tpl"}
<div class="list-group">

     {foreach from=$hoteles item=hotel}
          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
          <div class="d-flex w-100 justify-content-between">
               <h5 class="mb-1">{$hotel->nombre|upper}</h5>
               <small>3 days ago</small>
               <button type="button" class="btn btn-outline-danger"><a href="search/{$hotel->id_hotel}">Ver habitaciones</a></button>
          </div>
          <p class="mb-1">{$hotel->direccion}, {$hotel->localidad}</p>
          
          </a>
          
     {/foreach}
</div>

{include file="footer.tpl"}


