{include file="header-admin.tpl"}   
<main class="main-admin">   
    <div class="alta-baja-update">
        <h3>Editar registro - Tabla "Sala"</h3>
        {foreach from=$hoteles item=hotel}
            <form action='editarHotel/{$hotel->id}' method="POST" class="formulario">
                 <div class="form-group">
                        <label for="description">ID hotel</label>
                        <input class="form-control" id="description" name="input_hotel">
                    </div>
                    <div class="form-group">
                        <label for="priority">Nombre</label>
                        <input type="text" class="form-control" id="Nombre"  name="input_Nombre">
                    </div>
                    <div class="form-group">
                        <label for="priority">localidad</label>
                        <input type="text" class="form-control" id="localidad"  name="input_localidad">
                    </div>
                    <div class="form-group">
                        <label for="priority">Nombre</label>
                        <input type="text" class="form-control" id="Nombre"  name="input_Nombre">
                    </div>
                    <div class="form-group">
                        <label for="priority">telefono/Contacto</label>
                        <input type="number" class="form-control" id="telContacto"  name="input_telContacto">
                     </div>
                     <div class="form-group">
                        <label for="priority">Valoracion</label>
                        <input type="number" class="form-control" id="Valoracion"  name="input_Valoracion">
                    </div>
                    <div class="form-group">
                        <label for="priority">Select</label>
                        <input type="text" class="form-control" id="Select"  name="input_Select>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="input_completed" name="input_completed">
                        <label class="form-check-label" for="completed">Completada</label>
                    </div>
                         <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
        {/foreach}
    </div>

    <div class="links">
        <a href="admin">Volver</a>
    </div>
</main>
{include file="footer.tpl"}