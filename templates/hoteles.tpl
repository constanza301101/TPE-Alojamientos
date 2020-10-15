{include file="header.tpl" }
{include file="NavBar.tpl" }
{foreach from=$hoteles item=hotel}
    
    <div class="bui-card__image-container d-bh-promotion--image-container">
        Hotel: {$hotel->nombre}
        Localidad: {$hotel->localidad}
        Direccion: {$hotel->direccion}
        Valoracion: {$hotel->valoracion}
        Descripcion: {$hotel->descripcion}
    </div>
{/foreach}
{include file="footer.tpl" }