<?php
 $codinteracao = $_POST['codinteracao'];
 $entrada = $_POST['entrada'];
 $tipo = $_POST['tipo'];
 //$servico = $_POST['servico'];
 $ativo = $_POST['ativo'];


 require '../conector/conexion.php';

$query = "update interacao SET entrada = '$entrada', tipo = '$tipo', ativo = '$ativo' WHERE codinteracao = $codinteracao";

$sql = mysqli_query($conn, $query);

 if($sql == TRUE){
 	echo "Edição realizada com sucesso! XD";
 } else { echo "Erro!";}
?>
