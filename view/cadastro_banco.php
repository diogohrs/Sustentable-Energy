<?php 

    session_start();

    $logado = "false";

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    
    <title>Cadastro/Login</title>
</head>

<body>

    <div style="display: none;" class="container" id="cadastrar">
    <h1>Novo cadastro</h1>

    <form action="../model/cadastrar_usuario.php" method="POST">
        <div class="row">
            <div class="col-auto">
                <input type="text" name="txtCpf" maxlength="11" class="form-control" placeholder="CPF (Sem pontuação)"></input>
            </div>
            <div class="col-auto">
                <input type="text" name="txtNome" maxlength="100" class="form-control" placeholder="Nome"></input>
            </div>
            <div class="col-auto">
                <input type="password" name="txtSenha" class="form-control" placeholder="Senha"></input>
            </div>
            <div class="col-auto">
                <input type="text" name="txtCidade" class="form-control" placeholder="Cidade"></input>
            </div>
            <div class="col-auto">
                <input type="email" name="txtEmail" class="form-control" placeholder="Email"></input>
            </div>
        </div>
        
        </br></br>
            <input type="submit" value="Cadastrar" class="btn btn-success"></input>
    </form>
    <br/>
    <button type="button" onclick="MudarEstado('cadastro')" id="botaoLogar"> Realizar Login</button>
    </div>

<div style="display: block;" id="login" class="container">
	
	<h1>Realizar Login</h1>
	
	<form method="POST" action="../controller/logar.php">
		
		<input type="text" name="cpf" maxlength="11" class="form-control" placeholder="CPF (Sem pontuação)"></input>
		<input type="password" name="senha" class="form-control" placeholder="Senha" />
		<br/>
		<input type="submit" value="Login" class="btn btn-success"/>		
	</form>
	
	<br/><br/>
	<button type="button" onclick="MudarEstado('logar')" id="botaoCadastrar"> Realizar Cadastro</button>
</div>


<script type="text/javascript">
	
	function MudarEstado(el){

		if (el == "logar"){
			document.getElementById('login').style.display = 'none';
			document.getElementById('cadastrar').style.display = 'block';
            
		}
		else if (el == "cadastro"){
			document.getElementById('cadastrar').style.display = 'none';
			document.getElementById('login').style.display = 'block'; 
		}  
	}
	
</script>

</body>

</html>