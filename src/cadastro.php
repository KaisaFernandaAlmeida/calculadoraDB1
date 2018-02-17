<?php
	include("global.php");
	include("conecta.php");

	$msg = isset($_REQUEST['msg'])  ?   $_REQUEST['msg']   :   "";

	if($msg == 2){
		echo "<div class='cadastro_erro'> Usuário não cadastrado! Realize o cadastro abaixo para acessar a calculadora<br /><br /> </div>";
	}
?>

<body id="top">

<div class="tela_inicial">
	<div class="caixa_login">
	<form action="verifica_login.php?acao=cadastrar" method="post" id="form" name="form">
		<div class="clear">
		<div>
			Nome
			<input type="text" name="nome" value="" class="input_login" />
		</div> <br />
		<div>
			Login
			<input type="text" name="login" value="" class="input_login" />
		</div> <br />
		<div>
			Senha
			<input type="password" name="senha" value="" class="input_login" />
		</div>
		</div>
		<div class="botoes">
			<a href="login.php" class="efeito_botao"> 
				<input type="button" name="voltar" value="Voltar" class="bt_voltar" /> &nbsp; 
			</a>	
			<input type="submit" name="cadastrar" value="Cadastrar" class="bt_cadastro" />
		</div>
	</form>	
	</div>
</div>

</body>
