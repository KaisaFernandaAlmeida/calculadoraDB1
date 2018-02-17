<?php
$user='root'; //Nome de usuario do Sql
$password=''; //Senha do servidor

try {
  $conn = new PDO('mysql:host=localhost;dbname=calculadora', $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>