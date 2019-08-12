
<table class="table table-bordered">
	<thead class="titulo" bgcolor="#00FF00">
	<tr>
		<th> # </th>
		<th> Entrada </th>
		<th> Tipo </th>
		<th> Entrada ativo </th>
		<th> Saída </th>
		<th> Tipo saída </th>
		<th> Saida ativo </th>
		<th> </th>
	</tr>
</thead>
<?php

require '../conector/conexion.php';

$i = 0;
$query = "Select i.codinteracao as codinteracao, i.entrada as entrada, i.tipo as tipo, i.ativo as ativo, s.codinteracao as scodinteracao, s.codsaida as scodsaida, s.tipo as stipo, s.saida as saida, s.ativo as sativo From interacao i inner join saida s on (i.codinteracao = s.codinteracao) order by 1 desc, s.codsaida";

$sql = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($sql)){
	$i++;
	$icodinteracao = $row['codinteracao'];
	$entrada = $row['entrada'];
	$itipo = $row['tipo'];
	$iativo = $row['ativo'];
	$scodinteracao = $row['scodinteracao'];
	$scodsaida = $row['scodsaida'];
	$saida = $row['saida'];
	$stipo = $row['stipo'];
	$sativo = $row['sativo'];
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
			<td> <?php echo $stipo; ?></td>
			<td> <?php echo $saida; ?></td>
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
<!-- Modal -->
<div id="myModal_editar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #084B8A; color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Modal Editar </h4>
      </div>
      <div class="modal-body">
        <p> Edicion .</p>
        <div id="panel_editar"></div>
        <div id="panel_respuesta_edicion"></div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-info" onclick="btn_guardar_edicion();"> Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"> Cerrar </button>
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
