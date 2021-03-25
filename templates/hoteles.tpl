{include file="header.tpl" }
<!--TABLA CON TODOS LAS CATEGORIAS-->
<section class="contenedor_table">
    <table class="table">
        <caption class="titulo_table">{$titulo}</caption>
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
                    <td>{$hotel->hotel}</td>
                   <td>{$hotel->localidad}</td>
                   <td>{$hotel->nombre}</td>
                   <td>{$hotel->direccion}</td>
                   <td>{$hotel->telContacto}</td>
                   <td>{$hotel->valoracion}</td>
                   <td>{$hotel->descripcion}</td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</section>
{include file="footer.tpl" }