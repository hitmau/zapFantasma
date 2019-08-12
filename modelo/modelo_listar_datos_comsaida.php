
<table class="table table-bordered">
	<tr>
		<th> # </th>
		<th> Entrada </th>
		<th> Tipo </th>
		<th> Entrada ativo </th>
		<th> Opições Entrada </th>

		<th> Opições saída </th>
		<th> </th>
	</tr>
<?php

require '../conector/conexion.php';

$i = 0;
$query = "Select i.codinteracao as codinteracao, i.entrada as entrada, i.tipo as tipo, i.ativo as ativo from interacao i order by 1 desc";

$sql = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($sql)){
	$i++;
	$icodinteracao = $row['codinteracao'];
	$entrada = $row['entrada'];
	$itipo = $row['tipo'];
	$iativo = $row['ativo'];
?>
     <tr>
     	<td> <?php echo $i; ?></td>
     	<td> <?php echo $entrada; ?></td>
     	<td> <?php echo $itipo; ?></td>
     	<td> <?php echo $iativo; ?></td>
			<td class="col-lg-1">
				<button class="btn btn-primary btn-xs" style="width: 100%;" data-toggle="modal" data-target="#myModal_editar" onclick="btn_editar('<?php echo $icodinteracao; ?>');"> Editar </button>
				<button class="btn btn-danger btn-xs" style="width: 100%; margin-top: 1%;" data-toggle="modal" data-target="#myModal_eliminar" onclick="btn_eliminar('<?php echo $icodinteracao; ?>');"> Eliminar </button>
     	</td>
			<td>
			<table class="table table-bordered">
				<th> Saída </th>
				<th> Tipo saída </th>
				<th> Saida ativo </th>
<?php
			$query = "select s.codinteracao as scodinteracao, s.codsaida as scodsaida, s.tipo as stipo, s.saida as saida, s.ativo as sativo from saida s where s.codinteracao = $icodinteracao order by 2 desc";
			$sql_s = mysqli_query($conn, $query);
			while($row_s = mysqli_fetch_array($sql_s)){
				$scodinteracao = $row_s['scodinteracao'];
				$scodsaida = $row_s['scodsaida'];
				$saida = $row_s['saida'];
				$stipo = $row_s['stipo'];
				$sativo = $row_s['sativo'];
				?>
					<tr>
			<td> <?php echo $saida; ?></td>
		  <td> <?php echo $stipo; ?></td>
			<td> <?php echo $sativo; ?></td>
     	<td class="col-lg-1">
     		 <button class="btn btn-primary btn-xs" style="width: 100%;" data-toggle="modal" data-target="#myModal_editar" onclick="btn_editar_saida('<?php echo $scodinteracao; ?>' , '<?php echo $scodsaida; ?>');"> Editar </button>
     		 <button class="btn btn-danger btn-xs" style="width: 100%; margin-top: 1%;" data-toggle="modal" data-target="#myModal_eliminar" onclick="btn_eliminar_saida('<?php echo $scodinteracao; ?>' , '<?php echo $scodsaida; ?>');"> Eliminar </button>
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
<!-- Modal -->
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
      	<button type="button" class="btn btn-info" onclick="btn_guardar_edicion();"> Alterar </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"> Fechar </button>
      </div>
    </div>

  </div>
</div>


<!-- Modal -->
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
        <button type="button" class="btn btn-info" onclick="btn_eliminar_dato();"> Eliminar </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"> Cerrar </button>

      </div>
    </div>

  </div>
</div>
