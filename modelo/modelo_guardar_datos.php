<?php
 $codinteracao = $_POST['codinteracao'];
 $msganterior = $_POST['msganterior'];
 $entrada = $_POST['entrada'];
 $tipo = $_POST['tipo'];
 $tiposaida = $_POST['tiposaida'];
 $ativo = $_POST['ativo'];

 require '../conector/conexion.php';

$query = "update interacao SET entrada = '$entrada', msganterior = '$msganterior', tipo = '$tipo', tiposaida = '$tiposaida', ativo = '$ativo' WHERE codinteracao = $codinteracao";

$sql = mysqli_query($conn, $query);

 if($sql == TRUE){
 	echo "Edição realizada com sucesso! XD";
 } else { echo "Erro!";}
?>
