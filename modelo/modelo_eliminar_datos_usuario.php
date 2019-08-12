<?php

//$cod = $_POST['cod'];
$codusuario = $_POST['codusuario'];

require '../conector/conexion.php';

if ($codusuario == '0'){
  echo "Entrada não excluida!";
} else {

$query = "delete from usuario where codusuario = $codusuario";
$sqldel = mysqli_query($conn, $query);

if($sqldel == TRUE){
 echo "Entrada eliminada XD";
}

$query = "update usuario set cod = 0 where cod = $codusuario";
$sqlup = mysqli_query($conn, $query);

if($sqlup == TRUE){
 echo "Entrada eliminada XD";
}

 $query = "delete from saida where codinteracao in (select codinteracao from interacao where codusuario = $codusuario)";
 $sqlsai = mysqli_query($conn, $query);

 if($sqldel == TRUE){
 	echo "Entrada saida eliminada XD";
 }

 $query = "delete from interacao where codusuario = $codusuario";
 $sqlint = mysqli_query($conn, $query);

 if($sqlint == TRUE){
 	echo "Entrada interacao eliminada XD";
 }

 $query = "delete from parametros where codusuario = $codusuario";
 $sqlpar = mysqli_query($conn, $query);

 if($sqlpar == TRUE){
 	echo "Entrada parametros eliminada XD";
 }

 $query = "delete from contato where codusuario = $codusuario";
 $sqlcont = mysqli_query($conn, $query);

 if($sqlcont == TRUE){
 	echo "Entrada contato eliminada XD";
 }

 $query = "delete from imagem where codusuario = $codusuario";
 $sqlimg = mysqli_query($conn, $query);

 if($sqlimg == TRUE){
 	echo "Entrada imagem eliminada XD";
 }

 $query = "delete from login where codusuario = $codusuario";
 $sqllog = mysqli_query($conn, $query);

 if($sqllog == TRUE){
 	echo "Entrada login eliminada XD";
 }

}


?>
