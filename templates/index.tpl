{include file="header.tpl"}

<main class="mainIndex">
            
                <h1>HOTELERIA</h1>
                    {include file="NavBar.tpl"}
                    <ul class="list-group">
                        {foreach from=$hoteles item=hotel}
                            <a href='habsporhotel/{$hotel->id_hotel}' ><li class="list-group-item">{$hotel->nombre}</li> </a>
                        {/foreach}
                    </ul>


{include file="footer.tpl"}