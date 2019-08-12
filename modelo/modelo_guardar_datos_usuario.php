<?php
$codusuario = $_POST['codusuario'];
//$cod = $_POST['cod'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$telefone = $_POST['telefone'];
$ativo = $_POST['ativo'];


 require '../conector/conexion.php';

 $soma = "UPDATE `usuario` SET `nome` = '$nome', `email` = '$email', `senha` = '$senha', `telefone` = '$telefone', `ativo` = '$ativo' WHERE `codusuario` = $codusuario";

 $sql = mysqli_query($conn, $soma);

if($sql == TRUE){
 	echo "Edição realizada com sucesso! XD";
} else { echo "Erro!";}
?>
