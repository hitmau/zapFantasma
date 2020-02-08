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
} elseif ($ativo == 'N'){
	?>	<option value='N'>Não</option>
			<option value='S'>Sim</option>
	<?php
} else {
	?>
	<option value='1'>1</option>
	<option value='2'>2</option>
	<option value='3'>3</option>
	<option value='4'>4</option>
	<option value='5'>5</option>
	<option value='6'>6</option>
	<option value='7'>7</option>
	<option value='8'>8</option>
	<option value='12'>12</option>
	<option value='24'>24</option>
	<?php
}
?>
		</select>

<input type="hidden" id="data" value="<?php echo $data; ?>">
