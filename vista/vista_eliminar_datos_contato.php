<?php

$codcontato = $_POST['codcontato'];
$codusuario = $_POST['cod'];

require '../conector/conexion.php';

$query = "select nome from contato where codcontato = $codcontato";
$sql = mysqli_query($conn, $query);
$row = mysqli_fetch_array($sql);

echo "!! Desea Eliminar o contato: ";
echo $contato = $row['nome'];

echo " ?";
?>
<input type="hidden" id="cod" value="<?php echo $codusuario;?>">
<input type="hidden" id="codcontato" value="<?php echo $codcontato;?>">
