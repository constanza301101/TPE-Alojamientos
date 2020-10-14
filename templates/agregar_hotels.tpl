{include file="header.tpl"}
<div class="list-group">

     {foreach from=$hoteles item=hotel}
          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
          <div class="d-flex w-100 justify-content-between">
               <h5 class="mb-1">{$hotel->nombre|upper}</h5>
               <small>3 days ago</small>
               <button type="button" class="btn btn-outline-danger"><a href="search/{$hotel->id_hotel}">Ver habitaciones</a></button>
          </div>
          <p class="mb-1">{$hotel->direccion}, {$hotel->localidad}</p>
          
          </a>
          
     {/foreach}
</div>

    <div class="container">
                <form action="insert" method="post">
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
                </div>
{include file="footer.tpl"}


