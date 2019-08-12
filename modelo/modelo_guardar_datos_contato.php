<?php
 $codcontato = $_POST['codcontato'];
 $contato = $_POST['contato'];
 $ativo = $_POST['ativo'];
 $cadastro = $_POST['cadastro'];

 require '../conector/conexion.php';

$query = "update contato set nome = '$contato', ativo = '$ativo', cadastro = '$cadastro', data = now() where codcontato = $codcontato";

$sql = mysqli_query($conn, $query);

 if($sql == TRUE){
 	echo "Edição realizada com sucesso! XD";
 } else { echo "Erro!";}
?>
