{include file="header.tpl"}
{include file="NavBar.tpl"}
<div class="container">

<h1>Login</h1>

</div>

       <form action="VerificarUsuario" method="POST" id="formulario">
                    <div class="form-group">
                        <label for="user">Usuario</label>
                        <input class="form-control" id="user" name="inputUser" aria-describedby="emailHelp">
                
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" class="form-control" id="pass" name="inputPass">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>

</div>

 

{include file="footer.tpl"}