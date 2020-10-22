{include file="header.tpl"}
{include file="NavBar.tpl"}


    <div class="container">
                <form action="insertHotel" method="post">
                    <div class="form-group">
                        <label for="description">ID hotel</label>
                        <input class="form-control" id="description" name="input_hotel">
                    </div>
                    <div class="form-group">
                        <label for="priority">Nombre</label>
                        <input type="text" class="form-control" id="nombre"  name="input_nombre">
                    </div>
                    <div class="form-group">
                        <label for="priority">Localidad</label>
                        <input type="text" class="form-control" id="localidad"  name="input_localidad">
                    </div>
                    <div class="form-group">
                        <label for="priority">Direccion</label>
                        <input type="text" class="form-control" id="direccion"  name="input_direccion">
                    </div>
                    <div class="form-group">
                        <label for="priority">telefono/Contacto</label>
                        <input type="number" class="form-control" id="telContacto"  name="input_telContacto">
                     </div>
                     <div class="form-group">
                        <label for="priority">Valoracion</label>
                        <input type="number" class="form-control" id="valoracion"  name="input_valoracion">
                    </div>
                    <div class="form-group">
                        <label for="priority">Descripcion</label>
                        <input type="text" class="form-control" id="Select"  name="input_descripcion>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="input_completed" name="input_completed">
                        <label class="form-check-label" for="completed">Completada</label>
                    </div>
                         <button type="submit" class="btn btn-primary">Agregar</button>
               </form>
                </div>
{include file="footer.tpl"}


