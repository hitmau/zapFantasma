<?php

$codcontato = '0';
if (empty($_POST['codcontato'])) {
      echo "Entrada não excluida!";
  } else {
$codcontato = $_POST['codcontato'];


require '../conector/conexion.php';

if ($codcontato == '0'){
  echo "Entrada não excluida!";
} else {

$query = "delete from contato where codcontato = $codcontato";
$sql = mysqli_query($conn, $query);

 if($sql == TRUE){
 	echo "Entrada eliminada XD";
 }
}
}
?>
