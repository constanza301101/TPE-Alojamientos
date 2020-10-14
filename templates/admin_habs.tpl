{include file="header.tpl"}

<main>
<div class="Editar_habitaciones">
     <tbody>
        <h1>Habitacioens</h1>
        <table class="admin_habs">
           <thead>
                <td>
                    <th>Habitacion</th>
                    <th>Hotel</th>
                    <th>capacidadMax</th>
                    <th>cantCamas</th>
                    <th>cantBaños</th>
                    <th>TV</th>
                    <th>Wifi</th>
                    <th>Descripcion</th>
                </td>
           <thead>
    
         {foreach from=$Habitaciones item=habitacion }
                <tr id="tabla">
                 <tr>
                     <td>$habitacion->id_hotel</td>
                     <td>$habitacion->id_habitacion</td>
                     <td>$habitacion->capacidadMax</td>
                     <td>$habitacion->cantCamas</td>
                     <td>$habitacion->cantBanios</td>
                     <td>$habitacion->tv</td>
                     <td>$habitacion->wifi</td>
                     <td>$habitacion->descripcion</td>
                </tr>
                        <td>
                           <div>
                                <a class="editar" href='editar_habs/{$habitacion->id}'>Editar</a>
                            </div>
                            <div>
                                <a class="borrar" href='borrar_habs/{$habitacion->id}'> Borrar</a>
                            </div>
                            <div>
                                <a class="agregar" href='agregar_habs/{$habitacion->id}'> Agregar </a>
                            </div>
                        </td>
                    </tr>
          {/foreach}
                </tbody>
            </table>
    </div>
    
</main>
   

{include file="footer.tpl"}