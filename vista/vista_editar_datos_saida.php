<?php

echo $scodinteracao = $_POST['scodinteracao'];
echo $scodsaida = $_POST['scodsaida'];
echo $codusuario = $_POST['cod'];

require '../conector/conexion.php';

$query = "select i.entrada as entrada, s.codinteracao as scodinteracao, s.codsaida as scodsaida, s.saida as saida, s.tipo as tipo, s.ativo as ativo  from saida s inner join interacao i on (i.codinteracao = s.codinteracao) where s.codinteracao = $scodinteracao and s.codsaida = $scodsaida";

$sql = mysqli_query($conn, $query);
$row = mysqli_fetch_array($sql);

	$ncodinteracao = $row['scodinteracao'];
	$ncodsaida = $row['scodsaida'];
	$entrada = $row['entrada'];
	$saida = $row['saida'];
	$tipo = $row['tipo'];
	$ativo = $row['ativo'];

?>
<input type="hidden" id="acodinteracao" value="<?php echo $scodinteracao; ?>">
<input type="hidden" id="sscodsaida" value="<?php echo $scodsaida; ?>">
<input type="hidden" id="cod" value="<?php echo $codusuario; ?>">

<label for="entrada"> Entrada </label>
<select id="sscodinteracao" class="form-control" onchange="select_usuario();">
		 <option value="<?php echo $scodinteracao; ?>"> <?php echo $entrada; ?> </option>
			<?php
			require '../conector/conexion.php';
			$query = "Select * From interacao where codinteracao <> $ncodinteracao order by 1 desc";
$sql = mysqli_query($conn, $query);
while($row_s = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
					$zcodinteracao = $row_s['codinteracao'];
				 	$zentrada = $row_s['entrada'];
					?>
					<option value="<?php echo $zcodinteracao; ?>"> <?php echo $zentrada; ?></option>
					<?php
			}
			?>
	</select>

<label for="saida"> Saida </label>
<input type="text" class="form-control" id="saida" placeholder="* Nova saída de dados " value="<?php echo $saida; ?>">

<label for="atipo"> tipo </label>
<select id="tipo" class="form-control" onchange="select_usuario();">
		 <option value="<?php echo $tipo; ?>"> <?php echo $tipo; ?> </option>
			<?php
			require '../conector/conexion.php';
			$query = "select tipo from parametros where parametro = (select tipo from parametros where parametro = 'servconv') and tipo <> '$tipo'";
			$sql = mysqli_query($conn, $query);
			while($row_p = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
					$ptipo = $row_p['tipo'];
			?>
			<option value="<?php echo $ptipo; ?>"> <?php echo $ptipo; ?></option>
			<?php
				}
			?>
</select>

<label for="ativo"> ativo </label>
<select id="ativo" class="form-control">
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
