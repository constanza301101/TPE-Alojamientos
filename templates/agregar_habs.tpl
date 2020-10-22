{include file="header.tpl"}
{include file="NavBar.tpl"}

Inserte los datos de la nueva habitacion:
<div class="container">
    <form action="insertarHab" method="POST">
        <div class="form-group">
            <label for="priority">Habitacion</label>
            <input type="text" class="form-control" id="id_habitacion" name="input_habitacion">
        </div>
        <div class="respuesta">
            <select name="input_hotel">';
                {foreach from=$hoteles item=hotel}
                    <option value="{$hotel->id_hotel}">{$hotel->nombre}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group">
            <label for="priority">Capacidad maxima</label>
            <input type="text" class="form-control" id="capacidadMaxima"  name="input_capacidadMaxima">
        </div>
        <div class="form-group">
            <label for="priority">Cantidad camas</label>
            <input type="text" class="form-control" id="cantCamas"  name="input_cantCamas">
        </div>
        <div class="form-group">
            <label for="priority">Cantidad baños</label>
            <input type="text" class="form-control" id="cantBanios"  name="input_cantBanios">
        </div>
        <div class="form-group">
            <label for="priority">WiFi</label>
            <input type="text" class="form-control" id="Wifi"  name="input_Wifi">
        </div>
        <div class="form-group">
            <label for="priority">TV</label>
            <input type="text" class="form-control" id="TV"  name="input_TV">
        </div>
        <div class="form-group">
            <label for="priority">descripcion</label>
            <input type="text" class="form-control" id="select"  name="input_descripcion">
        </div>
        
        <button type="submit" class="text-secondary">Agregar</button>
        <button><a href="{BASE_URL}habitaciones">Cancelar</a></button>

    </form>
</div>
{include file="footer.tpl"}