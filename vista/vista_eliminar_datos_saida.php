<?php

 $codinteracao = $_POST['scodinteracao'];
 $codsaida = $_POST['scodsaida'];

require '../conector/conexion.php';

$query = "select saida from saida where codinteracao = $codinteracao and codsaida = $codsaida";
$sql = mysqli_query($conn, $query);
$row = mysqli_fetch_array($sql);

echo "!! Desea Eliminar a saída: ";
echo $saida = $row['saida'];
echo " ? ";


?>
<input type="hidden" id="codinteracao" value="<?php echo $codinteracao;?>">
<input type="hidden" id="codsaida" value="<?php echo $codsaida;?>">
