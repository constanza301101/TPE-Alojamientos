{include file="header.tpl"}
<!--HTML EDITAR HABS-->
<h1>editar Habitaciones</h1>
<form action="updateHab/{$habitacion->id_abitacion}" method="post">
    <input class="input" type="text" name="edit_habitacion" placeholder="Habitacion" value="{$Habitacion->habitacion }" required>
    <input class="input" type="text" name="edit_hotel" placeholder="Hotel" value="{$Habitacion->hotel }" required>
    <input class="input" type="text" name="edit_capacidadMax" placeholder="Capacidad Maxima" value="{$Habitacion->capacidadMax}" required>
    <input class="input" type="text" name="edit_cantCamas" placeholder="Cant. Camas" value="{$Habitacion->cantCamas }" required>
    <input class="input" type="text" name="edit_cantBanios" placeholder="Cant. baños" value="{$Habitacion->cantBanios }" required>
    <input class="input" type="text" name="edit_wifi" placeholder="wifi" value="{$Habitacion->wifi }" required>
    <input class="input" type="text" name="edit_tv" placeholder="tv" value="{$Habitacion->tv }" required>
    <input class="input" type="text" name="edit_descripcion" placeholder="descripcion" value="{$Habitacion->descripcion }" required>
    <input class="input" type="text" name="edit_estado" placeholder="estado" value="{$Habitacion->estado }" required>
    <button class="btn" type="submit">actualizar</button>
</form>
{include file="footer.tpl"}