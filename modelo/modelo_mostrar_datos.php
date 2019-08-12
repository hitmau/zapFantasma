<?php

 $codinteracao = $_POST['$codinteracao'];

require '../conector/conexion.php';

$query = "Select * From interacao where codinteracao = $codinteracao order by 1";

$sql = mysqli_query($conn, $query);

while($row_u = mysqli_fetch_array($sql, MYSQLI_ASSOC)){

$entrada = $row_u['entrada'];
$itipo = $row_u['tipo'];
$servico = $row_u['servico'];
$iativo = $row_u['ativo'];
?>
<h4> Datos del usuario para examinar </h4>
<table class="table table-condensed">
	<tr>
		<td> entrada : </td>
		<td> <?php echo $entrada; ?></td>
	</tr>

	<tr>
		<td> itipos : </td>
		<td> <?php echo $itipo; ?></td>
	</tr>

  <tr>
    <td> Serviço : </td>
    <td> <?php echo $servico; ?></td>
  </tr>

	<tr>
		<td> iativo : </td>
		<td> <?php echo $iativo; ?></td>
	</tr>
</table>
<?php
}
?>
