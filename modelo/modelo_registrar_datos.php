<?php

 $codusuario = $_POST['cod'];
 $entrada = $_POST['entrada'];
 $itipo = $_POST['itipo'];
 $tiposaida = $_POST['tiposaida'];
 $msganterior = $_POST['msganterior'];
 $iativo = $_POST['iativo'];
/*
 echo $codusuario;
 echo $entrada;
 echo $itipo;
 echo $tiposaida;
 echo $msganterior;
 echo $iativo;
*/


 require '../conector/conexion.php';

$query = "INSERT INTO `interacao` (`codinteracao`, `entrada`, `tipo`, `ativo`, `codusuario`, `tiposaida`, `ref`) VALUES (NULL, '$entrada', '$itipo', '$iativo', $codusuario, '$tiposaida', '$msganterior')";
$sql = mysqli_query($conn, $query);

echo $query;

if(empty($sql)){
  echo "Erro, campos vazios!";
  //echo $_POST['entrada'];
} else if($sql == TRUE) {
  echo "Registro Correcto XD";
} else {
  echo $sql;
  echo " Erro!";
}


?>
