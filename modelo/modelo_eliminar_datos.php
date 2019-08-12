<?php

$codinteracao = '';
if (empty($_POST['codinteracao'])) {
      echo "Entrada não excluida!";
  } else {
$codinteracao = $_POST['codinteracao'];

require '../conector/conexion.php';

if ($codinteracao == '0'){
  echo "Entrada não excluida!";
} else {

$query = "delete from interacao where codinteracao = $codinteracao";
$sql = mysqli_query($conn, $query);

 if($sql == TRUE){
 	echo "Entrada eliminada XD";
 }
}
}
?>
