{include file="header-admin.tpl"}   
<main class="main-admin">   
    <div class="alta-baja-update">
        <h3>Editar Habitaciones </h3>
        {foreach from=$Habitaciones item=Habitacion}
            <form action='editarSala/{$Habitacion->id}' method="POST" class="formulario">
                <label for="input_sala">Sala:</label>
                <input type="text" name="input_sala" value='{$Habitacion->letra}'>
                <label for="input_capacidad">Capacidad:</label>
                <input type="text" name="input_capacidad" value='{$Habitacion->capacidad}'>
                <label for="input_formato">Formato de Proyección:</label>
                <input type="text" name="input_formato" value='{$Habitacion->formato}'>
                <button name="editarSala" type="submit">Actualizar</button>
            </form>
        {/foreach}
    </div>

    <div class="links">
        <a href="admin">Volver</a>
    </div>
</main>
{include file="footer.tpl"}