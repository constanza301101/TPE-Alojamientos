{include file="header.tpl" }
<!--TABLA CON TODOS LOS HAB-->
{if $user}
    <div class="contenedor_logout_user">
        <h3>{$user}</h3>
        <!--BOTON QUE CIERRA LA SESIÓN-->
        <div>
            <p class="cerar_sesion_user">cerrar sesión</p>
            <button class="btn_logout_user" type="button"><a href="logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a></button>
        </div>
    </div>
{/if}
<section class="contenedor_table">
    <table class="table">
        <caption class="titulo_table">detalle de las habitaciones</caption>
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
        <tbody>
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
                </tr>
                <tr>
                    <td class="td_imag" colspan="5">
                        {foreach from=$images item=image}
                            <img class="img" src="{$image->imagen}">
                        {/foreach}
                    </td>
                </tr>
        </tbody>
    </table>
    <!--TABLA DE HOTEL DE HAB-->
     <table class="table">
        <caption class="titulo_table">hotel{$hotel->hotel}</caption>
        <thead>
            <tr>
               <th>HOTEL</th>
                <th>LOCALIDAD</th>
                <th>NOMBRE</th>
                <th>DIRECCION</th>
                <th>TEL/CONTACTO</th>
                <th>VALORACION</th>
                <th>DESCRIPCION</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{$hotel->hotel}</td>
                   <td>{$hotel->localidad}</td>
                   <td>{$hotel->nombre}</td>
                   <td>{$hotel->direccion}</td>
                   <td>{$hotel->telContacto}</td>
                   <td>{$hotel->valoracion}</td>
                   <td>{$hotel->descripcion}</td>
                </tr>
        </tbody>
    </table>
</section>
<!--FORMULARIO PARA AGREGAR UN COMENTARIO-->
{include file="comment.tpl"}
<!--COMENTARIOS-->
<div>
    {include file="vue/comments.vue"}
</div>

<script src="js/app_comments.js"></script>

{include file="footer.tpl" }