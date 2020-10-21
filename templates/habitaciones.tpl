{include file="header.tpl" }
{include file="NavBar.tpl" }
<h1> Habitaciones </h1>
<div>
    <a class="agregar" href='FormInsertHab'> Agregar </a>
</div>
<table class="table">
  <thead class="thead-dark">
    <tr>
        <th scope="col">N° Habitacion</th>
        <th scope="col">Hotel</th>
        <th scope="col">Capacidad Maxima</th>
        <th scope="col">Cantidad Camas</th>
        <th scope="col">Cantidad baños</th>
        <th scope="col">WiFi</th>
        <th scope="col">TV</th>
        <th scope="col"> </th>
        <th scope="col"> </th>
    </tr>
  </thead>
{foreach from=$habitaciones item=hab}
    <tbody>
        <tr>
            <td>{$hab->id}</td>
            <td>{$hab->id_hotel}</td>
            <td>{$hab->capacidadMax}</td>
            <td>{$hab->cantCamas}</td>
            <td>{$hab->cantBanios}</td>
            <td>{$hab->wifi}</td>
            <td>{$hab->tv}</td>
            <td><button><a href="verMasHabitacion/{$hab->id}/{$hab->id_hotel}">Ver más</a><button></td>
        
        {if $logeado}
            <td>
            <div>
                <button><a href="habitaciones/FormEditHab/{$hab->id}/{$hab->id_hotel}">Editar</a></button>
            </div>
            <div>
                <button><a href="habitaciones/deleteHabitacion/{$hab->id}">Borrar</a></button>
            </div>
            </td>
            {/if}
        </tr>
    </tbody>
{/foreach}

{include file="footer.tpl" }