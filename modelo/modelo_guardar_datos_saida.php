<?php
$acodinteracao = $_POST['acodinteracao'];
$codinteracao = $_POST['codinteracao'];
$codsaida = $_POST['codsaida'];
$saida = $_POST['saida'];
$tipo = $_POST['tipo'];
$ativo = $_POST['ativo'];
$codusuario = $_POST['cod'];


 require '../conector/conexion.php';

 $soma = "select count(codsaida) + 1 as soma from saida where codinteracao = $codinteracao";

 $sql = mysqli_query($conn, $soma);
 $row = mysqli_fetch_array($sql);

$result = $row['soma'];

if (empty($result)) {
  $result = 1;
}

//
$query = "select count(*) as count from saida where codinteracao = $acodinteracao and codsaida > $codsaida";
$sql_s = mysqli_query($conn, $query);
$row_s = mysqli_fetch_array($sql_s);
$count = $row_s['count'];
if (empty($count)) {
//
$query = "update saida SET codinteracao = $codinteracao, codsaida = $result, saida = '$saida', tipo = '$tipo', ativo = '$ativo' WHERE codinteracao = $acodinteracao and codsaida = $codsaida";
$sql = mysqli_query($conn, $query);
} else {
  $query = "update saida SET codinteracao = $codinteracao, codsaida = $result, saida = '$saida', tipo = '$tipo', ativo = '$ativo' WHERE codinteracao = $acodinteracao and codsaida = $codsaida";
  $sql = mysqli_query($conn, $query);

  // acerta numero anterior
  $j = $codsaida;
    for ($i = 1; $i <= $count; $i ++) {
      $j++;
      $query = "update saida set codsaida = $codsaida where codsaida = $j and codinteracao = $acodinteracao";
      $sql = mysqli_query($conn, $query);
      $codsaida++;
    }
    //
  }

if($query == TRUE){
 	echo "Edição realizada com sucesso! XD";
} else { echo "Erro!";}
?>
