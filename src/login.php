<?php
	include("global.php");
	include("conecta.php");

	$msg = isset($_REQUEST['msg'])  ?   $_REQUEST['msg']   :   "";

	if($msg == 1){
		echo "<div class='cadastro_ok'> Cadastro finalizado com sucesso!<br /><br /> </div>";
	}
?>

<body id="tela_inicial">

<div class="caixa_login">
	<form action="verifica_login.php?acao=entrar" method="post" id="form" name="form">
		<div>Efetue o login abaixo para acessar a calculadora:</div> 
		<br />
		<div class="clear">
		<div>
			Login
			<input type="text" name="login" value="<?php echo isset($_POST['login']); ?>" class="input_login" required />
		</div> <br />
		<div>
			Senha
			<input type="password" name="senha" value="<?php echo isset($_POST['senha']); ?>" class="input_login" required />
		</div>
		</div>
		<div class="botoes">
			<a href="cadastro.php" class="efeito_botao"> 
				<input type="button" name="cadastrar" value="Cadastrar" class="bt_cadastro" /> &nbsp; 
			</a>
			<input type="submit" name="entrar" value="Entrar" class="bt_entrar" />
		</div>
	</form>	
</div>

</body>
