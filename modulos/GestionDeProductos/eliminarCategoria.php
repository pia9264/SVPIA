<?php
session_start();
if (!$_SESSION['Logeado']){
header ("Location: index.php?p=login");
exit;
}
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../../base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM categoria WHERE id = '$id';");
$resultado = $sentencia->execute();
if($resultado === TRUE){
	header("Location: ./index.php?p=productos&correcto=del");
}else {
    header("Location: ./index.php?p=productos&correcto=error");
}
exit;
