		<table class="table full_table_list thead-dark">
		<thead class="titulo" bgcolor="#00FF00">
			<tr>
				<th bgcolor="#888"> # </th>
				<th bgcolor="#888"> Nome </th>
				<th bgcolor="#888"> E-mail </th>
				<th bgcolor="#888"> Telefone </th>
				<th bgcolor="#888"> Ativo </th>
				<th bgcolor="#888"> Data de cadastro </th>
				<th bgcolor="#888"> Opções </th>
			</tr>
			</thead>
			<br>
		<?php
		$codusuario = $_POST['cod'];

		require '../conector/conexion.php';

		$i = 0;

		if($codusuario == "0"){
		$query = "select * from usuario where codusuario = 0";

		$sql = mysqli_query($conn, $query);

		$row_t = mysqli_fetch_array($sql);
		$uucodusuario = $row_t['codusuario'];
		$unome = $row_t['nome'];
		$uemail = $row_t['email'];
		$utelefone = $row_t['telefone'];
		$uativo = $row_t['ativo'];
		$udata = $row_t['data'];
	?>
	     <tr>
	     	<td class="css-selector"> <?php echo $i; ?></td>
	     	<td class="css-selector"> <?php echo $unome; ?></td>
	     	<td class="css-selector"> <?php echo $uemail; ?></td>
	     	<td class="css-selector"> <?php echo $utelefone; ?></td>
	     	<td class="css-selector"> <?php echo $uativo; ?></td>
				<td class="css-selector"> <?php echo $udata; ?></td>
						<td class="col-lg-1">
							<button class="btn btn-primary btn-xs" style="width: 100%;" data-toggle="modal" data-target="#myModal_editar_usuario" onclick="btn_editar_usuario(<?php echo $codusuario; ?>, <?php echo $uucodusuario; ?>);"> Editar Admin </button>
			     	</td>
			     </tr>
				<?php

				$query = "select * from usuario where codusuario <> 0 order by 1";

				$sql = mysqli_query($conn, $query);

				while($row_t = mysqli_fetch_array($sql)){
				$i++;
				$uucodusuario = $row_t['codusuario'];
				$unome = $row_t['nome'];
				$uemail = $row_t['email'];
				$utelefone = $row_t['telefone'];
				$uativo = $row_t['ativo'];
				$udata = $row_t['data'];
			?>
			     <tr>
			     	<td class="css-selector"> <?php echo $i; ?></td>
						<td class="css-selector"> <?php echo $unome; ?></td>
			     	<td class="css-selector"> <?php echo $uemail; ?></td>
			     	<td class="css-selector"> <?php echo $utelefone; ?></td>
			     	<td class="css-selector"> <?php echo $uativo; ?></td>
						<td class="css-selector"> <?php echo $udata; ?></td>
								<td class="col-lg-1">
									<button class="btn btn-primary btn-xs" style="width: 100%;" data-toggle="modal" data-target="#myModal_editar_usuario" onclick="btn_editar_usuario(<?php echo $codusuario; ?>, <?php echo $uucodusuario; ?>);"> Editar </button>
									<button class="btn btn-danger btn-xs" style="width: 100%; margin-top: 1%;" data-toggle="modal" data-target="#myModal_eliminar_usuario" onclick="btn_eliminar_usuario(<?php echo $codusuario; ?>, <?php echo $uucodusuario; ?>);"> Eliminar </button>
								</td>
							 </tr>
						<?php

						 }
				} else{
		$i = 0;
		$query = "select * from usuario where codusuario = $codusuario and ativo = 'S'";

		$sql = mysqli_query($conn, $query);

		while($row = mysqli_fetch_array($sql)){
			$i++;
			$uucodusuario = $row['codusuario'];
			$nome = $row['nome'];
			$email = $row['email'];
			$telefone = $row['telefone'];
			$ativo = $row['ativo'];
			$data = $row['data'];
		?>
		     <tr>
					<td class="css-selector"> <?php echo $i; ?></td>
					<td class="css-selector"> <?php echo $nome; ?></td>
	 	     	<td class="css-selector"> <?php echo $email; ?></td>
	 	     	<td class="css-selector"> <?php echo $telefone; ?></td>
	 	     	<td class="css-selector"> <?php echo $ativo; ?></td>
	 				<td class="css-selector"> <?php echo $data; ?></td>
					<td class="col-lg-1">
						<button class="btn btn-primary btn-xs" style="width: 100%;" data-toggle="modal" data-target="#myModal_editar_usuario" onclick="btn_editar_usuario(<?php echo $codusuario; ?>, <?php echo $uucodusuario; ?>);"> Editar </button>
		     	</td>
		     </tr>
			<?php }
			$query = "select * from usuario where cod = $codusuario order by 1";

			$sql = mysqli_query($conn, $query);

			while($row = mysqli_fetch_array($sql)){
				$i++;
				$uucodusuario = $row['codusuario'];
				$nome = $row['nome'];
				$email = $row['email'];
				$telefone = $row['telefone'];
				$ativo = $row['ativo'];
				$data = $row['data'];
			?>
					 <tr>
						 <td class="css-selector"> <?php echo $i; ?></td>
						 <td class="css-selector"> <?php echo $nome; ?></td>
						<td class="css-selector"> <?php echo $email; ?></td>
						<td class="css-selector"> <?php echo $telefone; ?></td>
						<td class="css-selector"> <?php echo $ativo; ?></td>
						<td class="css-selector"> <?php echo $data; ?></td>
						<td class="col-lg-1">
							<button class="btn btn-primary btn-xs" style="width: 100%;" data-toggle="modal" data-target="#myModal_editar_usuario" onclick="btn_editar_usuario(<?php echo $codusuario; ?>, <?php echo $uucodusuario; ?>);"> Editar </button>
							<button class="btn btn-danger btn-xs" style="width: 100%; margin-top: 1%;" data-toggle="modal" data-target="#myModal_eliminar_usuario" onclick="btn_eliminar_usuario(<?php echo $codusuario; ?>, <?php echo $uucodusuario; ?>);"> Eliminar </button>
						</td>
					 </tr>
				<?php } ?>

		</table>
		<!-- fim do if -->
<?php } ?>
		<!-- Modal entrada -->
		<div id="myModal_editar_usuario" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header" style="background-color: #084B8A; color: white;">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title"> Editando Admin </h4>
		      </div>
		      <div class="modal-body">
		        <p> Edição: </p>
		        <div id="panel_editar_usuario"></div>
		        <div id="panel_respuesta_edicion_usuario"></div>
		      </div>
		      <div class="modal-footer">
		      	<button type="button" class="btn btn-info" onclick="btn_guardar_edicion_usuario(<?php echo $codusuario; ?>);"> Alterar </button>
		        <button type="button" class="btn btn-danger" data-dismiss="modal"> Fechar </button>
		      </div>
		    </div>

		  </div>
		</div>

		<!-- Modal Botão eliminar da Entrada -->
		<div id="myModal_eliminar_usuario" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header" style="background-color: red; color:white;">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Modal Eliminar Usuário</h4>
		      </div>
		      <div class="modal-body">
		        <p> Eliminar </p>
		        <div id="panel_eliminar_usuario"></div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-info" onclick="btn_eliminar_dato_usuario(<?php echo $codusuario; ?>);"> Eliminar </button>
		        <button type="button" class="btn btn-danger" data-dismiss="modal"> Sair </button>

		      </div>
		    </div>

		  </div>
		</div>
