{include file="header-admin.tpl"}   
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col"> N° Habitacion</th>
      <th scope="col">Hotel</th>
      <th scope="col">Capacidad Maxima</th>
      <th scope="col">Cantidad Camas</th>
      <th scope="col">Cantidad baños</th>
      <th scope="col">WiFi</th>
      <th scope="col">TV</th>
      <th scope="col">Descripcion</th>
      <th scope="col">admin</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <th scope="row">1</th>
     <td>{$habitacion->id}</td>
     <td>{$habitacion->capacidadMax}</td>
     <td>{$habitacion->cantCamas}</td>
     <td>{$habitacion->cantBanios}</td>
     <td>{$habitacion->wifi}</td>
     <td>{$habitacion->tv}</td>
     <td>{$habitacion->desccripcion}</td>
    </tr>
  </tbody>
  <tbody>
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
    </tbody>
</table>                
   

{include file="footer.tpl"}