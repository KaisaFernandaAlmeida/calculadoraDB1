<?php
// include("global.php");
include("conecta.php");
include("executa.php");

// $id    = isset($_REQUEST['id'])     ?   $_REQUEST['id']      :   "";
// $visor = isset($_REQUEST['visor'])  ?   $_REQUEST['visor']   :   "";
// $nome  = isset($_REQUEST['nome'])   ?   $_REQUEST['nome']    :   "";

// $sql_select = "select nome from cadastro where id = ". $id;
// $qry_select = $conn->execute($sql_select);
// // $qry_select->execute();
// $res_select = $qry_select->fetch(PDO::FETCH_ASSOC);

// // exit;
// $nome  = isset($res_select['nome']) ?   $res_select['nome']  :   "";



// $sql_insere = "insert into registro_operacao (data_operacao, operacao, responsavel)
// 									values ('".date('Y-m-d')."', '".$visor."', '".$nome."')";
// $conn->query($sql_insere);


$raiz      = isset($_POST['raiz'])        ?   $_POST['raiz']         :   "";
$resultado = isset($_POST['resultado'])   ?   $_POST['resultado']        :   "";


if($raiz != ""){
	$numero     = $_POST['raiz'];
	$mostraRaiz = sqrt($numero);
	echo $mostraRaiz;
}

if($resultado != ""){
	$numRes     = $_POST['resultado'];
	$mostraCalc = Exibir_resultado::calcular($numRes);
	echo $mostraCalc;

	// $soma 		   = substr_count($numRes, "+");
	// $divisao 	   = substr_count($numRes, "/");
	// $subtracao     = substr_count($numRes, "-");
	// $multiplicacao = substr_count($numRes, "*");

	// $porcentagem      = substr_count($numRes, "%");
	// $abre_parenteses  = substr_count($numRes, "(");
	// $fecha_parenteses = substr_count($numRes, ")");


	// $total_operacao = $soma + $divisao + $subtracao + $multiplicacao;

	// if($total_operacao == 0){
	// 	echo "nao tem nenhum calculo a ser feito!";

	// }else if ($total_operacao == 1){
	// 	echo "apenas um calculo a ser feito!";
	
	// }else if($total_operacao > 1){
	// 	echo "mais de um calculo a ser feito";
	// }	

	//echo $mostraCalc;
}


?>