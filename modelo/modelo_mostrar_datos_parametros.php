<?php

 $codparametros = $_POST['codparametros'];

require '../conector/conexion.php';

$query = "Select * From parametros order by 1";

$sql = mysqli_query($conn, $query);

while($row_u = mysqli_fetch_array($sql, MYSQLI_ASSOC)){

$ptipo = $row_u['tipo'];
$pobs = $row_u['obs'];
$pparametro = $row_u['parametro'];
?>
<h4> Dados dos parametros do sistema </h4>
<table class="table table-condensed">
	<tr>
		<td> parametro : </td>
		<td> <?php echo $pparametro; ?></td>
	</tr>

	<tr>
		<td> tipo : </td>
		<td> <?php echo $ptipo; ?></td>
	</tr>

	<tr>
		<td> obs : </td>
		<td> <?php echo $pobs; ?></td>
	</tr>
</table>
<?php
}
?>
