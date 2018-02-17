<!DOCTYPE html>
<html>
<head>
<title> Calculadora DB1 </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="css/layout.css" rel="stylesheet" type="text/css" media="all">

<?php
// session_start();
// error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

header("Content-Type: text/html; charset=UTF-8",true);
		
if($_SERVER["HTTP_HOST"] == 'localhost'){
	$url = "http://localhost/calculadora/";
}
// else{
// 	$url = "http://site.com.br/novo/";		
// }
$base = "_media/";
$tituloPagina = utf8_decode(".::  Calculadora DB1 ::.");

?>

</head>