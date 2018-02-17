<?php
	include("global.php");
	include("conecta.php");
?>

<body id="top">

<?php
	$login = isset($_REQUEST['login'])  ?   $_REQUEST['login']   :   "";
	$senha = isset($_REQUEST['senha'])  ?   $_REQUEST['senha']   :   "";
	$acao  = isset($_REQUEST['acao'])   ?   $_REQUEST['acao']    :   "";


	if($acao == "entrar"){

		$sql_select   = "select id, login, senha from cadastro where login = '".$login."' and senha = '".$senha."'";
		$res_consulta = $conn->prepare($sql_select);
		$res_consulta->execute();


		 if($res_consulta->rowCount() == 1){

		 	while($linha_consulta = $res_consulta->fetch(PDO::FETCH_ASSOC)){
		 	 	header("location:calculadora.php?id=".$linha_consulta['id']);  //"logado!";
		 	 	
		 	} 
		 }else{

		 		header("location:cadastro.php?msg=2");  //nao tem cadastro!";
		 }

		 //header("location:cadastro.php?msg=2");  //nao tem cadastro!";

	}else if($acao == "cadastrar"){

		echo "quer cadastrar!";

		$sql_insere = "insert into cadastro (nome, login, senha)
									values ('".$_POST['nome']."', '".$_POST['login']."', '".$_POST['senha']."')";
		
		$conn->query($sql_insere);
	
		header("location:login.php?msg=1"); //2								

	}

	
?>

</body>
