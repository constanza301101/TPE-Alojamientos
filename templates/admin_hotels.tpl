{include file="header.tpl"}

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Hotel</th>
      <th scope="col">Nombre</th>
      <th scope="col">Localidad</th>
      <th scope="col">Direccion</th>
      <th scope="col">Telefono/contacto</th>
      <th scope="col">Valoracion</th>
      <th scope="col">Descripcion</th>
      <th scope="col">admin</th>
    </tr>
  </thead>
  <tbody>
  {foreach from=collection item=item key=key name=name}

    <tr>
     <th scope="row">1</th>
     <td>{$hotel->id_hotel}</td>
     <td>{$hotel->nombre}</td>
     <td>{$hotel->localidad}</td>
     <td>{$hotel->direccion}</td>
     <td>{$hotel->telContacto}</td>
     <td>{$hotel->valoracion}</td>
     <td>{$hotel->descripcion}</td>
    </tr>
  </tbody>
  <tbody>
      <td>
         <div>
              <a class="editar" href='editar_hotels/{$hotel->id_hotel}'>Editar</a>
          </div>
          <div>
              <a class="borrar" href='borrar_hotels/{$hotel->id_hotel}'> Borrar</a>
          </div>
          <div>
              <a class="agregar" href='agregar_hotels/{$hotel->id_hotel}'> Agregar </a>
          </div>
      </td>
  {/foreach}
 </tbody>
</table>            

   

{include file="footer.tpl"}