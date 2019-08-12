<?php
 $codparametros = $_POST['codparametros'];
 //$data = $_POST['data'];
 $ativo = $_POST['ativo'];
 $codusuario = $_POST['cod'];


 require '../conector/conexion.php';

$query = "update parametros set ativo = '$ativo', data = now() where codparametros = $codparametros and codusuario = $codusuario";

$sql = mysqli_query($conn, $query);

 if($sql == TRUE){
 	echo "Edição realizada com sucesso! XD";
 } else { echo "Erro!";}
?>
