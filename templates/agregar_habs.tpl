{include file="header.tpl"}
<div class="list-group">

     {foreach from=$hoteles item=hotel}
          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
          <div class="d-flex w-100 justify-content-between">
               <h5 class="mb-1">{$habitaciones->nombre|upper}</h5>
               <small>3 days ago</small>
               <button type="button" class="btn btn-outline-danger"><a href="search/{$habitaciones->id}">Ver descripcion de habitaciones</a></button>
          </div>          
          </a>
          
     {/foreach}
</div>
<div class="container">
                <form action="insert" method="post">
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
               </form>
                </div>
{include file="footer.tpl"}