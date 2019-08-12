
<table class="table full_table_list thead-dark">
<thead class="titulo" bgcolor="#00FF00">
	<tr>
		<th bgcolor="#888"> # </th>
		<th bgcolor="#888"> Contato/Nome </th>
		<th bgcolor="#888"> Ativo </th>
		<th bgcolor="#888"> Cadastro </th>
		<th bgcolor="#888"> Data </th>
		<th bgcolor="#888"> Opções </th>
	</tr>
	</thead>
<?php
$codusuario = $_POST['cod'];

require '../conector/conexion.php';

$i = 0;
$query = "Select codcontato, nome, ativo, cadastro, data from contato where nome = 'todos' and codusuario = $codusuario";

$sql = mysqli_query($conn, $query);

$row_t = mysqli_fetch_array($sql);
$codcontatot = $row_t['codcontato'];
	$contatot = $row_t['nome'];
	$ativot = $row_t['ativo'];
	$cadastrot = $row_t['cadastro'];
	$datat = $row_t['data'];
	?>
	     <tr>
	     	<td class="css-selector"> 0 </td>
	     	<td class="css-selector"> <?php echo $contatot; ?></td>
	     	<td class="css-selector"> <?php echo $ativot; ?></td>
				<td class="css-selector"> <?php echo $cadastrot; ?></td>
	     	<td class="css-selector"> <?php echo $datat; ?></td>
				<td class="col-lg-1">
					<button class="btn btn-primary btn-xs" style="width: 100%;" data-toggle="modal" data-target="#myModal_editar_contato" onclick="btn_editar_contato(<?php echo $codcontatot; ?>, <?php echo $codusuario; ?>);"> Editar todos </button>
	     	</td>
	     </tr>
		<?php



$i = 0;
$query = "Select codcontato, nome, ativo, cadastro, data from contato where nome <> 'todos' and codusuario = $codusuario order by 1 desc";

$sql = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($sql)){
	$i++;
	$codcontato = $row['codcontato'];
	$contato = $row['nome'];
	$ativo = $row['ativo'];
	$cadastro = $row['cadastro'];
	$data = $row['data'];
?>
     <tr>
     	<td class="css-selector"> <?php echo $i; ?></td>
     	<td class="css-selector"> <?php echo $contato; ?></td>
     	<td class="css-selector"> <?php echo $ativo; ?></td>
			<td class="css-selector"> <?php echo $cadastro; ?></td>
     	<td class="css-selector"> <?php echo $data; ?></td>
			<td class="col-lg-1">
				<button <?php if ($contato == 'todos') { echo " disabled ";}?> class="btn btn-primary btn-xs" style="width: 100%;" data-toggle="modal" data-target="#myModal_editar_contato" onclick="btn_editar_contato(<?php echo $codcontato; ?>, <?php echo $codusuario; ?>);"> Editar </button>
				<button <?php if ($contato == 'todos') { echo " disabled ";}?> class="btn btn-danger btn-xs" style="width: 100%; margin-top: 1%;" data-toggle="modal" data-target="#myModal_eliminar_contato" onclick="btn_eliminar_contato(<?php echo $codcontato; ?>, <?php echo $codusuario; ?>);"> Eliminar </button>
     	</td>
     </tr>
	<?php
}
?>

</table>

<!-- Modal entrada -->
<div id="myModal_editar_contato" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #084B8A; color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Editando Contato </h4>
      </div>
      <div class="modal-body">
        <p> Edição: </p>
        <div id="panel_editar_contato"></div>
        <div id="panel_respuesta_edicion_contato"></div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-info" onclick="btn_guardar_edicion_contato(<?php echo $codusuario; ?>);"> Alterar </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"> Fechar </button>
      </div>
    </div>

  </div>
</div>

<!-- Modal Botão eliminar da Entrada -->
<div id="myModal_eliminar_contato" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: red; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Eliminar</h4>
      </div>
      <div class="modal-body">
        <p> Eliminar </p>
        <div id="panel_eliminar_contato"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" onclick="btn_eliminar_dato_contato(<?php echo $codusuario; ?>);"> Eliminar </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"> Sair </button>

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
        <button type="button" class="btn btn-info" onclick="btn_eliminar_dato_saida();"> Eliminar </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"> Cerrar </button>

      </div>
    </div>

  </div>
</div>
