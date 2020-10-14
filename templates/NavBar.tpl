{include file="header.tpl"}


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="home">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="habitaciones">Habitaciones <span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="hotel">Hoteles <span class="sr-only"></span></a>
      </li>
      {if $logeado}
            <li class="nav-item active">
            <a class="nav-link" href="logout">Logout <span class="sr-only"></span></a>
            </li>           
      {else}     
         <li class="nav-item active">
        <a class="nav-link" href="login">Login <span class="sr-only"></span></a>
         </li>
       {/if}
      </ul>
      </div>
</nav>


{include file="footer.tpl"}