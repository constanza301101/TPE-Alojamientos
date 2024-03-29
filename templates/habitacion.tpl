{include file="header.tpl" }
<!--SELECTOR DE HOTEL PARA FILTRAR-->
{if $user}
    <div class="contenedor_logout_user">
        <h3>{$user}</h3>
        <!--BOTON DE CERRAR SESIÓN-->
        <div>
            <p class="cerar_sesion_user">cerrar sesión</p>
            <button class="btn_logout_user" type="button"><a href="logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a></button>
        </div>
    </div>
{/if}
{include file="selectHotel.tpl"}
<!--BUSCADOR-->
{include file="search.tpl"}
<!--TABLA CON TODOS LAAS HABITACIONES-->
<section class="contenedor_table">
    <table class="table">
        <caption class="titulo_table">{$title}</caption>
        <thead>
            <tr>
                <th>habitacion</th>
                <th>hotel</th>
                <th>capacidad Maxima</th>
                <th>cantidad de camas</th>
                <th>cantidad de baños</th>
                <th>wifi</th>
                <th>wtv</th>
                <th>descripcion</th>
                <th>estado</th>
            </tr>
        </thead>
        <tbody id="tabla">
            {foreach from=$habitaciones item=habitacion}
                <tr>
                    <td>{$habitacion->habitacion}</td>
                    <td>{$habitacion->hotel}</td>
                    <td>{$habitacion->capacidadMax}</td>
                    <td>{$habitacion->cantCamas}</td>
                    <td>{$habitacion->cantBanios}</td>
                    <td>{$habitacion->wifi}</td>
                    <td>{$habitacion->tv}</td>
                    <td>{$habitacion->descripcion}</td>
                    <td>{$habitacion->estado}</td>
                    <td class="excepcion"><button class="verMas" type="button"><a href="itemDetail/{$habitacion->id}">ver más</a></button></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</section>
<nav >
<ul class="navCompaginacion">
    {foreach from=$pagination item=index}
        <li class="liCompagnacion">
           {if $index == $page}
                <a class="linkCompaginacion marcado" href="home/{$index}">{$index}</a>
            {else}
                <a class="linkCompaginacion" href="home/{$index}">{$index}</a>
            {/if}
        </li>
    {/foreach}
</ul>
</nav>
{include file="footer.tpl" }