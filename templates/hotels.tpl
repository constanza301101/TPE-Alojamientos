{include file="header.tpl"}
<div class="container">

          <ul class="list-group">

              {foreach from=$hoteles item=hotel}
                    <li class="list-group-item list-group-item-success">{$hotel->nombre|upper}<span class="badge badge-primary badge-pill">{$hotel->direccion}</span> <button type="button" class="btn btn-outline-danger"><a href="delete/{$hotel->id_hotel}">Borrar</a></button></li>
               {/foreach}
          
          </ul>
          </div>

{include file="footer.tpl"}