{include file="header.tpl"}
<!--HTML EDITAR HOTELS-->
<h1>editar Hoteles</h1>
<form action="updateHotel/{$hotel->id_hotel}" method="post">
    <input class="input" type="text" name="edit_hotel" placeholder="Hotel" value="{$hotel->Hotel}" required>
    <input class="input" type="text" name="edit_hotel_id" placeholder="Hotel ID" value="{$hotel->id_hotel}" required>
    <input class="input" type="text" name="edit_localidad" placeholder="Localidad" value="{$hotel->localidad}" required>
    <input class="input" type="text" name="edit_nombre" placeholder="Nombre" value="{$hotel->nombre}" required>
    <input class="input" type="text" name="edit_direccion" placeholder="Direccion" value="{$hotel->direccion}" required>
    <input class="input" type="text" name="edit_telContacto" placeholder="Telefono/contacto" value="{$hotel->telContacto}" required>
    <input class="input" type="text" name="edit_valoracion" placeholder="Valoracion" value="{$hotel->valoracion}" required>
    <input class="input" type="text" name="edit_descripcion" placeholder="Descripcion" value="{$hotel->descripcion}" required>
    <button class="btn" type="submit">actualizar</button>
</form>
{include file="footer.tpl"}


