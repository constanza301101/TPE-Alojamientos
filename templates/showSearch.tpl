include file="header.tpl"}
<!--SI ES USUARIO-->
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
<!--SELECTOR DE HOETEL PARA FILTRAR-->
{include file="selectHotel.tpl"}
<!--BUSCADOR-->
{include file="search.tpl"}
<!--TABLA CON TODOS LAS HASB-->
<section class="contenedor_table">
    <table class="table">
        <caption class="titulo_table">{$title}</caption>
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

                    {foreach from=$hotels item=hotel}
                        {if hotel->id_hotel == $habitacion->id_hotel}
                            <td>{hotel->hotel}</td>
                        {/if}
                    {/foreach}
                    <td class="excepcion"><button class="verMas" type="button"><a href="itemDetail/{$habitacion->id}">ver más</a></button></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</section>
{include file="footer.tpl"}