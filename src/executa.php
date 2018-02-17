<?php
	
class Exibir_resultado{

	function calcular(){
		for($x=0; $x<strlen($numRes); $x++){
			
			$character = $numRes[$x];

			if($character == "+" || $character == "-" || $character == "*" || $character == "/"){
				$operador = $character;
			}
		}

		$var  = explode($operador, $numRes);
		$numA = $var[0];
		$numB = $var[1];

	 	if($character == "+"){
			$mostraCalc = $numA + $numB;
			
		
		}elseif($character == "-"){
			$mostraCalc = $numA - $numB;
			
		
		}elseif($character == "*"){
			$mostraCalc = $numA * $numB;
			
		
		}elseif($character == "/"){
			$mostraCalc = $numA / $numB;
			
		
		}elseif($character == "%"){
			$mostraCalc = $numA + ($numB/100);
			
		
		}else

		echo $mostraCalc;
	}
}	
?>