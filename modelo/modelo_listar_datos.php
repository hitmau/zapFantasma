
<table class="table full_table_list">
		<thead class="titulo" bgcolor="#00FF00">
	<tr>
		<th bgcolor="#888"> # </th>
		<th bgcolor="#888"> Entrada </th>
		<th bgcolor="#888"> Tipo </th>
		<th bgcolor="#888"> Tipo saida </th>
		<th bgcolor="#888"> Entrada ativo </th>
		<th bgcolor="#888"> Opções Entrada </th>
		<th bgcolor="#888"> Opções saída </th>

	</tr>
</thead>
<?php
$codusuario = $_POST['cod'];

require '../conector/conexion.php';

$i = 0;
$query = "select i.codinteracao as codinteracao, i.entrada as entrada, i.tipo as tipo, i.tiposaida as tiposaida, i.ativo as ativo from interacao i where i.codusuario = $codusuario order by 1 desc";

$sql = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($sql)){
	$i++;
	$icodinteracao = $row['codinteracao'];
	$entrada = $row['entrada'];
	$itipo = $row['tipo'];
	$tiposaida = $row['tiposaida'];
	$iativo = $row['ativo'];
?>
     <tr>
     	<td class="css-selector"> <?php echo $i; ?></td>
     	<td class="css-selector"> <?php echo $entrada; ?></td>
     	<td class="css-selector"> <?php echo $itipo; ?></td>
			<td class="css-selector"> <?php if ($tiposaida == 'a') {echo 'Imprimir aleatório'; } else {echo 'Imprimir todos';} ?></td>
     	<td class="css-selector"> <?php echo $iativo; ?></td>
			<td class="col-lg-1">
				<button class="btn btn-primary btn-xs" style="width: 100%;" data-toggle="modal" data-target="#myModal_editar" onclick="btn_editar('<?php echo $icodinteracao; ?>');"> Editar </button>
				<button class="btn btn-danger btn-xs" style="width: 100%; margin-top: 1%;" data-toggle="modal" data-target="#myModal_eliminar" onclick="btn_eliminar('<?php echo $icodinteracao; ?>', <?php echo $codusuario = $_POST['cod'];?>);"> Eliminar </button>
     	</td>
			<td>
			<table class="table">
				<thead class="titulo" bgcolor="#00FF00">
					<tr>
				<th bgcolor="#ccc"> Saída </th>
				<th bgcolor="#ccc"> Tipo saída </th>
				<th bgcolor="#ccc"> Saida ativo </th>
				<th bgcolor="#ccc"> Opções</th>
			</tr>
			</thead>
<?php
			$query = "select s.codinteracao as scodinteracao, s.codsaida as scodsaida, s.tipo as stipo, s.saida as saida, s.ativo as sativo from saida s where s.codinteracao = $icodinteracao order by 2 asc";
			$sql_s = mysqli_query($conn, $query);
			while($row_s = mysqli_fetch_array($sql_s)){
				$scodinteracao = $row_s['scodinteracao'];
				$scodsaida = $row_s['scodsaida'];
				$saida = $row_s['saida'];
				$stipo = $row_s['stipo'];
				$sativo = $row_s['sativo'];
				?>
					<tr>
			<td class="css-selector"> <?php echo $saida; ?></td>
		  <td class="css-selector"> <?php echo $stipo; ?></td>
			<td class="css-selector"> <?php echo $sativo; ?></td>
     	<td class="col-lg-1">
     		 <button class="btn btn-primary btn-xs" style="width: 100%;" data-toggle="modal" data-target="#myModal_editar_saida" onclick="btn_editar_saida(<?php echo $scodinteracao; ?> , <?php echo $scodsaida; ?>, <?php echo $codusuario = $_POST['cod'];?>);"> Editar </button>
     		 <button class="btn btn-danger btn-xs" style="width: 100%; margin-top: 1%;" data-toggle="modal" data-target="#myModal_eliminar_saida" onclick="btn_eliminar_saida('<?php echo $scodinteracao; ?>' , '<?php echo $scodsaida; ?>');"> Eliminar </button>
     	</td>
		</tr>

			<?php
		}
		?>
	</table>
</tr>
     </tr>
	<?php
}
?>

</table>

<!-- Modal entrada -->
<div id="myModal_editar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #084B8A; color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Editanto entrada </h4>
      </div>
      <div class="modal-body">
        <p> Edição: </p>
        <div id="panel_editar"></div>
        <div id="panel_respuesta_edicion"></div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-info" onclick="btn_guardar_edicion(<?php echo $codusuario; ?>);"> Alterar </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"> Fechar </button>
      </div>
    </div>

  </div>
</div>
<!--Saida-->
<div id="myModal_editar_saida" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #084B8A; color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Editanto saida </h4>
      </div>
      <div class="modal-body">
        <p> Edição: </p>
        <div id="panel_editar_saida"></div>
        <div id="panel_respuesta_edicion_saida"></div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-info" onclick="btn_guardar_edicion_saida(<?php echo $codusuario; ?>);"> Alterar </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"> Fechar </button>
      </div>
    </div>

  </div>
</div>


<!-- Modal Botão eliminar da Entrada -->
<div id="myModal_eliminar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: red; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Eliminar</h4>
      </div>
      <div class="modal-body">
        <p> Eliminar </p>
        <div id="panel_eliminar"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" onclick="btn_eliminar_dato(<?php echo $codusuario; ?>);"> Eliminar </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"> Cerrar </button>

      </div>
    </div>

  </div>
</div>

<!-- Modal Botão eliminar da Saída -->
<div id="myModal_eliminar_saida" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: red; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Eliminar saída</h4>
      </div>
      <div class="modal-body">
        <p> Eliminar </p>
        <div id="panel_eliminar_saida"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" onclick="btn_eliminar_dato_saida(<?php echo $codusuario; ?>);"> Eliminar </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"> Cerrar </button>

      </div>
    </div>

  </div>
</div>
