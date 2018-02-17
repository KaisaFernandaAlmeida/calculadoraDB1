<?php
	include("global.php");
	include("conecta.php");
?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">

<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
$( function() {
	$( "#datepicker" ).datepicker();
	$( "#datepicker_final" ).datepicker();
} );

function limparVisor(){
	document.getElementById('visor').value='';
}

function apagarCaracter(){
	valor       = document.getElementById("visor");
	valorAntigo = valor.value;
	valorAtual  = valorAntigo.slice(0,(valorAntigo.length-1));
	valor.value = valorAtual;
}

function mostraNumero(numero){
	visorRecebe = document.getElementById('visor');

	valorAntigo       = visorRecebe.value;
	valorAtual        = valorAntigo+numero;
	visorRecebe.value = valorAtual;
}

function raiz(){
	numRaiz     = document.getElementById("visor");
	calculaRaiz = numRaiz.value;

	$.ajax({
		url:'valida_operacao.php',
		method:'post',
		data:{'raiz':calculaRaiz}
	}).done(function(valorRaiz){
		numRaiz.value = valorRaiz;
	});
}

// function porcentagem(){
// 	numPorcem     = document.getElementById("visor");
// 	calculaPorcem = numPorcem.value;

// 	if(calculaPorcem !)
// }

function resultado(){
	numCalc    = document.getElementById("visor");
	calculaRes = numCalc.value;

	$.ajax({
		url:'valida_operacao.php',
		method:'post',
		data:{'resultado':calculaRes}
	}).done(function(valorCalc){
		numCalc.value = valorCalc;
	});
}
</script>


<?php
	$id    = isset($_REQUEST['id'])     ?   $_REQUEST['id']      :   0;
	$acao  = isset($_REQUEST['acao'])   ?   $_REQUEST['acao']    :   "";

	$sql_consulta =  "select nome, login, senha from cadastro where id = ". $id;
	
	$res_consulta = $conn->prepare($sql_consulta);
	$res_consulta->execute();
	$linha_consulta = $res_consulta->fetch(PDO::FETCH_ASSOC);

	$nome  = isset($linha_consulta['nome'])   ?   $linha_consulta['nome']    :   "";
?>

<body id="top">

	<div class="alinha_numeros">
		<?php echo "Olá <b>".$nome."</b>, bem vindo ao sistema de Calculadora"; ?>
		&nbsp &nbsp
		<a href="login.php">
			<input type="button" name="sair" value="Sair" class="bt_sair" />
		</a>
	</div>
	<br /> <br />

	<div id="calculadora">
	<form action="valida_operacao.php" id="form1" name="form1">
		<table id="table" class="table table-bordered table-hover">
			<tr>
				<td colspan="4"><input type="text" class="form-control" id="visor"></td>
			</tr>
			<tr>
				<td><button type="button" onclick="apagarCaracter();" class="btn btn-primary">&larr;</button></td>
				<td><button type="button" onclick="limparVisor();" class="btn btn-primary">CE</button></td>
				<td><button type="button" onclick="limparVisor();" class="btn btn-primary">C</button></td>
				<td><button type="button" onclick="mostraNumero('/');" class="btn btn-primary">/</button></td>
			</tr>
			<tr>
				<td><button type="button" onclick="mostraNumero('7');" class="btn btn-primary">7</button></td>
				<td><button type="button" onclick="mostraNumero('8');" class="btn btn-primary">8</button></td>
				<td><button type="button" onclick="mostraNumero('9');" class="btn btn-primary">9</button></td>
				<td><button type="button" onclick="mostraNumero('*');" class="btn btn-primary">*</button></td>
			</tr>
			<tr>
				<td><button type="button" onclick="mostraNumero('4');" class="btn btn-primary">4</button></td>
				<td><button type="button" onclick="mostraNumero('5');" class="btn btn-primary">5</button></td>
				<td><button type="button" onclick="mostraNumero('6');" class="btn btn-primary">6</button></td>
				<td><button type="button" onclick="mostraNumero('+');" class="btn btn-primary">+</button></td>
			</tr>
			<tr>
				<td><button type="button" onclick="mostraNumero('1');" class="btn btn-primary">1</button></td>
				<td><button type="button" onclick="mostraNumero('2');" class="btn btn-primary">2</button></td>
				<td><button type="button" onclick="mostraNumero('3');" class="btn btn-primary">3</button></td>
				<td><button type="button" onclick="mostraNumero('-');" class="btn btn-primary">-</button></td>
			</tr>
			<tr>
				<td><button type="button" onclick="mostraNumero('0');" class="btn btn-primary">0</button></td>
				<td><button type="button" onclick="mostraNumero('.');" class="btn btn-primary">.</button></td>
				<td><button type="button" onclick="raiz();" class="btn btn-primary">&radic;</button></td>
				<td rowspan="2"><button type="button" onclick="resultado();" class="btn btn-primary bt_igual">=</button></td>
			</tr>
			<tr>
				<td><button type="button" onclick="mostraNumero('(');" class="btn btn-primary">(</button></td>
				<td><button type="button" onclick="mostraNumero(')');" class="btn btn-primary">)</button></td>
				<td><button type="button" onclick="porcentagem();" class="btn btn-primary">%</button></td>
			</tr>
		</table>
	</form>
	</div>


	<table border="0" cellpadding="10" cellspacing="0" class="tabela_filtro">
		<tr>
			<td colspan="2"> Histórico das Operações: </td>
		</tr>
		<tr>
			<td colspan="2"> <b> Filtrar por </b> </td>
		</tr>
		<tr>		
			<td> Data Inicial </td>  
			<td> <input type="text" id="datepicker" class="input_filtro"> </td> 
		</tr>
		<tr>
			<td> Data Final</td>
			<td><input type="text" id="datepicker_final" class="input_filtro"></td>
		</tr>
		<tr>
			<td> Responsável </td>
			<td>			
				<select name="responsavel" class="input_filtro">
				<?php
					$sql_select   = "select id, nome from cadastro ";
					$res_consulta = $conn->prepare($sql_select);
					$res_consulta->execute();

					while($linha_consulta = $res_consulta->fetch(PDO::FETCH_ASSOC)){
				?>
						<option value=""><?php echo $linha_consulta['nome']; ?></option>
				<?php		
					}	
				?>					
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right"> <input type="submit" name="buscar" value="Buscar" class="bt_buscar"></td>
		</tr>
	</table>

	<table border="0" cellpadding="10" cellspacing="0" class="relatorio_filtro">
		<tr>
			<td class="titulo_filtro">Data operação</td>
			<td class="titulo_filtro">Operação</td>
			<td class="titulo_filtro">Responsável</td>
		</tr>
		<tr>
			<td class="coluna_filtro">testeee</td>
			<td class="coluna_filtro">testeee</td>
			<td>testeee</td>
		</tr>	
	</table>

</body>
