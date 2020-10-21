{include file="header-admin.tpl"}   
<main class="main-admin">   
    <div class="alta-baja-update">
        <h3>Editar Habitaciones </h3>
        {foreach from=$Habitaciones item=Habitacion}
            <form action='editarHabitacion/{$Habitacion->id}' method="POST" class="formulario">
                    <div class="form-group">
                        <label for="priority">Habitacion</label>
                        <input type="text" class="form-control" id="id_habitacion" name="input_habitacion">
                    </div>
                    <div class="form-group">
                        <label for="priority">hotel</label>
                        <input type="text" class="form-control" id="hotel"  name="input_hotel">
                     </div>
                    <div class="form-group">
                        <label for="priority">Capacidad maxima</label>
                        <input type="text" class="form-control" id="capacidadMaxima"  name="input_capcidadMaxima">
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
                        <input type="text" class="form-control" id="select"  name="input_select">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="input_completed" name="input_completed">
                        <label class="form-check-label" for="completed">Completada</label>
                    </div>
                         <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
        {/foreach}
    </div>

    <div class="links">
        <a href="admin">Volver</a>
    </div>
</main>
{include file="footer.tpl"}