{include file="header.tpl"}

 <!--BARRA DE NAVEGACIÓN ADMINISTRADOR-->
<nav class="botoneratexto">
    <ul class="menu botones_admin">
        <li class="botones"><a class="link" href="admin">habitacion</a></li>
        <li class="botones"><a class="link" href="adminUsers">Usuarios</a></li>
    </ul>
</nav>

<div class="div_logout">
    <p class="cerarSesion">cerrar sesión</p>
    <button class="btn_logout" type="button"><a href="logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a></button>
</div>
<section class="contenedor_table">
    <table class="table_habitacion">
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
                    <td class="excepcion"><button type="button"><a href="edit/{$habitacion->id}"><i class="fas fa-edit"></i></a></button></td>
                    <td class="excepcion"><button id="btn_borrar" type="button"><a href="delete/{$habitacion->id}"><i class="fas fa-trash"></i></a></button></td>
                </tr>
                <tr>
                    <td class="td_imag" colspan="4">
                        {foreach from=$images item=image}
                            {if $image->id_phabitacion == $habitacion->id}
                                <img class="img" src="{$image->imagen}">
                            {/if}
                        {/foreach}
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</section>
<!--FORMULARIO PARA INSERTAR HAB-->
{include file="agregar_hasb.tpl"}
<!--TABLA DE HOTELES-->
<section class="contenedor_table">
    <table class="table">
        <caption class="titulo_table">tabla de hotel</caption>
        <caption id="alert">al eliminar una hotel también se eliminarán las habs relacionados a esta
            <button id="btn_alert" type="button" class="sowAlert">
                <span>&times;</span>
            </button>
        </caption>
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
        <tbody id="tabla">
            {foreach from=$hotel item=hotel}
                <tr>
                  <tr>
                    <td>{$hotel->hotel}</td>
                   <td>{$hotel->localidad}</td>
                   <td>{$hotel->nombre}</td>
                   <td>{$hotel->direccion}</td>
                   <td>{$hotel->telContacto}</td>
                   <td>{$hotel->valoracion}</td>
                   <td>{$hotel->descripcion}</td>
                </tr>
                    <td class="excepcion"><button  type="button"><a href="editHotel/{$hotel->id_hotel}"><i class="fas fa-edit"></i></a></button></td>
                    <td class="excepcion"><button  type="button"><a href="deleteHotel/{$hotel->id_hotel}"><i class="fas fa-trash"></i></a></button></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</section>
<!--FORMULARIO PARA INSERTAR UN HOTEL-->
{include file="agregar_hotels.tpl"}

<script src="js/btn_alert.js"></script>
{include file="footer.tpl"}
