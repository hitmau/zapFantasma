<?php
 $contato = '';
 $ativo = '';
 $cadastro = '';
$codusuario = $_POST['cod'];

  if (empty($_POST['contato'])) {
        $errors[] = 'Enter your first name.';
    }
 else {
$contato = $_POST['contato'];
 }

 if (empty($_POST['ativo'])) {
        $errors[] = 'Enter your first name.';
    }
 else {
 $ativo = $_POST['ativo'];
 }

 if (empty($_POST['cadastro'])) {
        $errors[] = 'Enter your first name.';
    }
 else {
 $cadastro = $_POST['cadastro'];
 }

 require '../conector/conexion.php';


 if($contato == ''){
	 echo " Vazio! ";
	 //echo $_POST['entrada'];
 } else {
	 $sql = mysqli_query($conn, "INSERT INTO `contato` (`nome`, `ativo`, `cadastro`, `data`, `codusuario`) VALUES ('$contato', '$ativo', '$cadastro', now(), $codusuario)");

 }
 if($sql == TRUE){
 echo "Registro Correcto XD";
} else {echo "Erro :(";}

?>
