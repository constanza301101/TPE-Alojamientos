{include file="header.tpl" }
{include file="NavBar.tpl" }
<h1> Hoteles </h1>
<table class="table">
  <thead class="thead-dark">
    <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Localidad</th>
        <th scope="col">Direccion</th>
        <th scope="col">Telefono/contacto</th>
        <th scope="col">Valoracion</th>
        <th scope="col">Desccripcion</th>
    </tr>
  </thead>
{foreach from=$hoteles item=hotel}
    <tbody>
       
            <tr>
              
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
{/foreach}
{include file="footer.tpl" }