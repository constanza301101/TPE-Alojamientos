{include file="header.tpl"}
{include file="NavBar.tpl"}
<div class="container">

<h1>Login</h1>

</div>

       <form action="verifyUser" method="post">
                    <div class="form-group">
                        <label for="user">Usuario</label>
                        <input class="form-control" id="user" name="input_user" aria-describedby="emailHelp">
                
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" class="form-control" id="pass" name="input_pass">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>

</div>

 

{include file="footer.tpl"}