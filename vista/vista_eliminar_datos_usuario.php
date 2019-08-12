<?php

$codusuario = $_POST['codusuario'];

require '../conector/conexion.php';

$query = "select nome from usuario where codusuario = $codusuario";
$sql = mysqli_query($conn, $query);
$row = mysqli_fetch_array($sql);

echo "Desea Eliminar o usuário: '";
echo $contato = $row['nome'];

echo "'? Obs.: Tudo referente aneste usuario será perdido, entradas, saídas e etc.";
?>
<input type="hidden" id="codusuario" value="<?php echo $codusuario;?>">
