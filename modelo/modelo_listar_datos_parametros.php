
<table class="table table-bordered">
	<tr>
		<th> # </th>
		<th> Obs </th>
		<th> Parâmetro </th>
		<th> tipo </th>
		<th> data de alteração </th>
	</tr>
<?php
$codusuario = $_POST['cod'];

require '../conector/conexion.php';

$i = 0;
$query = "Select codparametros, obs, parametro, tipo, data, case when ativo = 'S' then 'Sim' else case when ativo = 'N' then 'Não' else ativo end end as ativo from parametros where editavel = 'S' and codusuario = $codusuario order by 1";

$sql = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($sql)){
	$i++;
	$codparametros = $row['codparametros'];
	$obs = $row['obs'];
	$parametro = $row['parametro'];
	$tipo = $row['tipo'];
	$data = $row['data'];
  $ativo = $row['ativo'];
	?>
     <tr>
     	<td> <?php echo $i; ?></td>
     	<td> <?php echo $obs; ?></td>
     	<td> <?php echo $ativo; ?></td>
			<td> <?php echo $data; ?></td>
     	<td class="col-lg-1">
     		 <button class="btn btn-primary btn-xs" style="width: 100%;" data-toggle="modal" data-target="#myModal_editar_parametros" onclick="btn_editar_parametros('<?php echo $codparametros; ?>');"> Editar </button>
     	</td>
     </tr>
	<?php
}

?>

</table>
<!-- Modal -->
<div id="myModal_editar_parametros" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #084B8A; color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Modal Editar </h4>
      </div>
      <div class="modal-body">
        <p> Edicion .</p>
        <div id="panel_editar_parametros"></div>
        <div id="panel_respuesta_edicion_parametros"></div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-info" onclick="btn_guardar_edicion_parametros(<?php echo $codusuario; ?>);"> Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"> Sair </button>
      </div>
    </div>

  </div>
</div>
