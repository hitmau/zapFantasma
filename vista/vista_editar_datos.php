<?php

$codinteracao = $_POST['codinteracao'];

require '../conector/conexion.php';

$query = "select i.entrada, i.tipo, i.servico, i.ativo, p.obs FROM interacao i left join parametros p on (i.servico = p.tipo) WHERE codinteracao = $codinteracao";

$sql = mysqli_query($conn, $query);
$row = mysqli_fetch_array($sql);

	$entrada = $row['entrada'];
	$itipo = $row['tipo'];
	$servico = $row['servico'];
	$obs = $row['obs'];
	$iativo = $row['ativo'];
?>
<input type="hidden" id="iicodinteracao" value="<?php echo $codinteracao; ?>">

<label for="entrada"> entrada </label>
<input type="text" class="form-control" id="iientrada" placeholder="* entrada " value="<?php echo $entrada; ?>">

<label for="tipo"> tipo </label>
<select class="form-control" id="iitipo" onchange="select_usuario();">
		 <option value="<?php echo $itipo; ?>"> <?php echo $itipo; ?> </option>
			<?php

			require '../conector/conexion.php';

			$query = "Select distinct tipo From interacao where tipo <> '$itipo' order by 1 desc";

$sql = mysqli_query($conn, $query);

while($row_s = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
					$tipo = $row_s['tipo'];
					?>

					<option value="<?php echo $tipo; ?>"> <?php echo $tipo; ?></option>
					<?php
			}
			?>
	</select>

	<label for="servico"> Serviço </label>
	<select class="form-control" id="iiservico" onchange="select_usuario();">
		<option value="<?php echo $servico; ?>"><?php echo $obs; ?></option>
		 <?php
		 require '../conector/conexion.php';
		 $query = "select tipo, obs from parametros where parametro = 'servconv' and tipo <> '$servico'";

$sql = mysqli_query($conn, $query);

while($row_p = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
				 $ptipo = $row_p['tipo'];
				 $obs = $row_p['obs'];
				 ?>
				 <option value="<?php echo $ptipo; ?>"> <?php echo $obs; ?></option>
				 <?php
		 }
		 ?>
 </select>

<label for="ativo"> ativo </label>
<select id="iiativo" class="form-control">
	<?php if ($iativo == 'S') {
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
