{include file="header.tpl"}

<main class="mainIndex">
            
                <h1>HOTELERIA</h1>
                {include file="NavBar.tpl"}
                    <p>Filtrar por hotel:</p>
                    <form action="habsporhotel" method="POST">
                        <select name="idHotel">
                              
                        {foreach from=$hoteles item=hotel}
                            <option value={$hotel->id_hotel} >{$hotel->nombre} </option>
                        {/foreach}
                   
                        </select>
                    <button type="submit">Filtrar</button>
                    <button><a href="habitaciones">Mostrar Todas</a></button>
                    </form>

                    
                  


{include file="footer.tpl"}