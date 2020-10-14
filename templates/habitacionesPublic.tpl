{include file="header.tpl" }
{include file="NavBar.tpl" }
{foreach from=$habitaciones item=hab}
    
    <div class="bui-card__image-container d-bh-promotion--image-container">
        Habitación número: {$hab->id}
        Capacidad: {$hab->capacidadMax}
    </div>
{/foreach}
{include file="footer.tpl" }