<?php

$codcontato = $_POST['codcontato'];
$codusuario = $_POST['cod'];

require '../conector/conexion.php';

$query = "select * from contato WHERE codcontato = $codcontato";

$sql = mysqli_query($conn, $query);
$row = mysqli_fetch_array($sql);

	echo $contato = $row['nome'];
	echo $ativo = $row['ativo'];
	echo $cadastro = $row['cadastro'];
	echo $data = $row['data'];
?>
<input type="hidden" id="cod" value="<?php echo $codusuario; ?>">
<input type="hidden" id="acodcontato" value="<?php echo $codcontato; ?>">

<label for="acontato"> Nome/Contato </label>
<input type="text" class="form-control" id="acontato" placeholder="* Nome do contato " value="<?php echo $contato; ?>">

<label> Ativo </label>
<select class="form-control" id="aativo">
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

	<label> Cadastro pelo Google </label>
	<select class="form-control" id="acadastro">
		<?php if ($cadastro == 'S') { ?>
				<option value='S'>Sim</option>
				<option value='N'>Não</option>
				<option value=''>Em branco</option>
  	<?php	} elseif ($cadastro == 'N') {	?>
			  <option value='N'>Não</option>
				<option value='S'>Sim</option>
				<option value=''>Em branco</option>
		<?php } else {	?>
				<option value=''>Em branco</option>
				<option value='N'>Não</option>
				<option value='S'>Sim</option>
		<?php } ?>
			</select>
