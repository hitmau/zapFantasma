<?php

$codparametros = $_POST['codparametros'];
$data = 'now()';

require '../conector/conexion.php';

$query = "SELECT * FROM parametros WHERE codparametros = $codparametros";

$sql = mysqli_query($conn, $query);
$row = mysqli_fetch_array($sql);
$codparametros = $row['codparametros'];
$obs = $row['obs'];
$parametro = $row['parametro'];
$ativo = $row['ativo'];
$data = $row['data'];
?>
<input type="hidden" id="codparametros" value="<?php echo $codparametros; ?>">

<label for="entrada"> Descrição do parâmetro </label>
<input type="text" class="form-control" id="obs" placeholder="* entrada " disabled="" value="<?php echo $obs; ?>">

<label for="ativo"> Opção </label>
<select class="form-control" id="ativo">
	<?php if ($ativo == 'S') {
	?>	<option value='S'>Sim</option>
	  	<option value='N'>Não</option>
	<?php
} else {
	?>	<option value='N'>Não</option>
			<option value='S'>Sim</option>
	<?php
}
?>
		</select>

<input type="hidden" id="data" value="<?php echo $data; ?>">
