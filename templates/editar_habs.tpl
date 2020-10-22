{include file="header.tpl"}
{include file="NavBar.tpl"}
<form action="editarHab" method="POST">

    <div class="tabla_inputs">
        <label>Habitacion</label>
            <div class="respuesta">
                <input class="input_habitacion" name="input_habitacion" type="text" value="{$habitacion->id}" placeholder="{$habitacion->id}">
            </div>
            <div class="respuesta">
                <select name="input_hotel">';
                    {foreach from=$hoteles item=hotel}
                        <option value="{$hotel->id_hotel}">{$hotel->nombre}</option>
                    {/foreach}
                </select>
            </div>
            <label>Capacidad Maxima</label>
            <div class="respuesta">
                <input class="input_capacidadMaxima" name="input_capacidadMaxima" type="text" value="{$habitacion->capacidadMax}" placeholder="{$habitacion->capacidadMax}">
            </div>
            <label>Cantidad de Camas</label>
            <div class="respuesta">
                <input class="input_cantCamas" name="input_cantCamas" type="text" value="{$habitacion->cantCamas}" placeholder="{$habitacion->cantCamas}">
            </div>
            <label>Cantidad de Baños</label>
            <div class="respuesta">
                <input class="input_cantBanios" name="input_cantBanios" type="text" value="{$habitacion->cantBanios}" placeholder="{$habitacion->cantBanios}">
            </div>   
            <label>Wifi</label>
                <div class="respuesta">
                    <input class="input_WiFi" name="input_Wifi" type="text" value="{$habitacion->WiFi}" placeholder="{$habitacion->WiFi}">
                </div>
            <label>TV</label>
                <div class="respuesta">
                    <input class="input_tv" name="input_tv" type="text" value="{$habitacion->tv}" placeholder="{$habitacion->tv}">
                </div>  
            <label>Descripcion</label>
                <div class="respuesta">
                    <input class="input_descriptionHab " name="input_descriptionHab " type="text" value="{$habitacion->descripcion}" placeholder="{$habitacion->descripcion}">
                </div>   
            <label>Hotel</label>
            
        <div>
            <button type="submit">Editar</button>
            <button><a href="{BASE_URL}habitaciones">Cancelar</a></button>
        </div>
    </div>
<form>   
{include file="footer.tpl"}