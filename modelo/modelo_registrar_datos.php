<?php

 $codusuario = $_POST['cod'];
 $entrada = $_POST['entrada'];
 $itipo = $_POST['itipo'];
 $tiposaida = $_POST['tiposaida'];
 $msganterior = $_POST['msganterior'];
 $iativo = $_POST['iativo'];



 require '../conector/conexion.php';


 if($entrada == ''){
	 echo "  Vazio! ";
	 echo $entrada;
	 echo $itipo;
	 echo $iativo;
	 //echo $_POST['entrada'];
 } else {
	 $sql = mysqli_query($conn, "INSERT INTO `interacao` (`codinteracao`, `entrada`, `tipo`, `ativo`, `codusuario`, `tiposaida`, `msganterior`) VALUES (NULL, '$entrada', '$itipo', '$iativo', $codusuario, '$tiposaida', '$msganterior')");


 }
 if($sql == TRUE){
 	echo "Registro Correcto XD";
 }

?>
