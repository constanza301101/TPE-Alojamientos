{include file="header.tpl"}

<main>
<div class="Editar_habitaciones">
     <tbody>
        <h1>Hoteles</h1>
        <table class="admin_habs">
           <thead>
                <td>
                    <th>id_hotel</th>
                    <th>localidad</th>
                    <th>nombre</th>
                    <th>direccion</th>
                    <th>telefono/contacto</th>
                    <th>valoracion</th>
                    <th>Descripcion</th>
                </td>
           <thead>
    
         {foreach from=$Hoteles item=Hotel }
                <tr id="tabla">
                 <tr>
                     <td>$Hotel->id_hotel</td>
                     <td>$Hotel->localidad</td>
                     <td>$Hotel->nombre</td>
                     <td>$Hotel->direccion</td>
                     <td>$Hotel->telContato</td>
                     <td>$Hotel->valoracion</td>
                     <td>$Hotel->descripcion</td>
                </tr>
                        <td>//VER CON EL CONTROLLER
                           <div>
                                <a class="editar" href='editar_hotels/{$habitacion->id}'>Editar</a>
                            </div>
                            <div>
                                <a class="borrar" href='borrar_hotels/{$habitacion->id}'> Borrar</a>
                            </div>
                            <div>
                                <a class="agregar" href='agregar_hotels/{$habitacion->id}'> Agregar </a>
                            </div>
                        </td>
                    </tr>
          {/foreach}
                </tbody>
            </table>
    </div>
    
</main>
   

{include file="footer.tpl"}