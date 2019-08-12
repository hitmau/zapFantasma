<?php

$codinteracao = $_POST['codinteracao'];
$codusuario = $_POST['cod'];

require '../conector/conexion.php';

$query = "select count(codinteracao) as nao from saida where codinteracao = $codinteracao";
$sql = mysqli_query($conn, $query);
$row = mysqli_fetch_array($sql);

$nao = $row['nao'];

if (empty($nao)) {

$query = "select entrada from interacao where codinteracao = $codinteracao";
$sql = mysqli_query($conn, $query);
$row = mysqli_fetch_array($sql);

echo "!! Desea Eliminar a Entrada ";
echo $entrada = $row['entrada'];

echo " ?";
?>
<input type="hidden" id="cod" value="<?php echo $codusuario;?>">
<input type="hidden" id="codinteracao" value="<?php echo $codinteracao;?>">

<?php
} else {
  echo "Primeiro exclua as saídas que contém nesta entrada!";
}
?>
<input type="hidden" id="cod" value="<?php echo $codusuario;?>">
<input type="hidden" id="codinteracao" value="0">
