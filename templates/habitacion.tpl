{include file="header.tpl" }
{include file="NavBar.tpl" }
<h1> Habitacion </h1>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Habitacion número: {$habitacion->id}</h5>
    
    <p class="card-text">La capacidad máxima es: {$habitacion->capacidadMax}</p>
    <p class="card-text">Cuenta con {$habitacion->cantCamas} camas.</p>
    <p class="card-text">Cuenta con {$habitacion->cantBanios} baños.</p>
    {if $habitacion->wifi}
      <p class="card-text">Cuenta con wifi.</p>
    {/if}
    {if $habitacion->tv}
      <p class="card-text">Cuenta con tv.</p>
    {/if}
    <p class="card-text">{$habitacion->descripcion}</p>

  </div>
</div>
{include file="footer.tpl" }