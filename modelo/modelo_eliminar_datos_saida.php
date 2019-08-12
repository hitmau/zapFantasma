<?php
$codinteracao = $_POST['codinteracao'];
$codsaida = $_POST['codsaida'];

require '../conector/conexion.php';

$query = "select count(*) as count from saida where codinteracao = $codinteracao and codsaida > $codsaida";
$sql_s = mysqli_query($conn, $query);
$row_s = mysqli_fetch_array($sql_s);
$count = $row_s['count'];

if ($count == $codsaida){
   $query = "delete from saida where codinteracao = $codinteracao and codsaida = $codsaida";
   $sql = mysqli_query($conn, $query);
} else {
  $query = "delete from saida where codinteracao = $codinteracao and codsaida = $codsaida";
  $sql = mysqli_query($conn, $query);
$j = $codsaida;
  for ($i = 1; $i <= $count; $i ++) {
    $j++;
    $query = "update saida set codsaida = $codsaida where codsaida = $j and codinteracao = $codinteracao";
    $sql = mysqli_query($conn, $query);
    $codsaida++;
  }

}
 if($sql == TRUE){
 	echo "Dados eliminados XD";
 }
?>
