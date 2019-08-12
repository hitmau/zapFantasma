<!DOCTYPE html>
<?php
	// A sessão precisa ser iniciada em cada página diferente
	if (!isset($_SESSION)) session_start();
	// Verifica se não há a variável da sessão que identifica o usuário
	if (!isset($_SESSION['cod'])) {
			// Destrói a sessão por segurança
			session_destroy();
			// Redireciona o visitante de volta pro login
			header("Location: ../index.php"); exit;
	}
	?>
<html>
<head>
	<title> PC </title>
	<link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap-theme.min.css">
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans+Extra+Condensed:600&display=swap" rel="stylesheet">

	<script type="text/javascript" src="../librerias/bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="../librerias/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../controlador/control_usuario.js"></script>

	<style type="text/css">

	        /*Definido cor das linhas pares*/
	        .full_table_list tr:nth-child(even) {background: #EEE}

	        /*Definindo cor das Linhas impáres*/
	        .full_table_list tr:nth-child(odd) {background: #FFF}

					.css-selector {font-family: 'Fira Sans Extra Condensed', sans-serif; font-size:20px;}

					.titulo {font-family: 'Fira Sans Extra Condensed', sans-serif; font-size:23px;}

	    </style>

</head>
<body onload="btn_listar_datos_usuario(<?php echo $_SESSION['cod']; ?>);">
	<h1> Controle de ueuário </h1>
	<div class="row" style="margin: 0px; padding: 0px;">
    <div class="col-lg-12 col-md-12 xs-12">
    	<h3 align="center"> Registro de usuário </h3>
    	<div id="panel_registro_contato" style="padding: 0%; box-shadow: 1px 2px 2px #A4A4A4; border:1px solid #A4A4A4;" align="center">
    		<!-- Panel de datos -->
				<table class="table table-condensed" style="width: 100%;">
					<tr>
						<td>
							<h4 align="center"> Usuário </h4>
							<!-- Painel de entrada -->
				    		<table class="table table-condensed" style="width: 100%;">
				    			<tr>
				    				<td> <label> Nome </label></td>
				    				<td> <input type="text" id="nome" class="form-control" placeholder="* Nome "></td>
								  </tr>
									<tr>
				    				<td> <label> E-mail </label></td>
				    				<td> <input type="text" id="email" class="form-control" placeholder="* E-mail "></td>
								  </tr>
									<tr>
				    				<td> <label> Telefone </label></td>
				    				<td> <input type="text" id="telefone" class="form-control" placeholder="* Telefone "></td>
								  </tr>
									<tr>
				    				<td> <label> Senha </label></td>
				    				<td> <input type="password" id="senha1" class="form-control" placeholder="* Senha "></td>
								  </tr>
									<tr>
				    				<td> <label> Confirma Senha </label></td>
				    				<td> <input type="password" id="senha2" class="form-control" placeholder="* Senha de novo! "></td>
								  </tr>
				    			<tr> <td> <label> Ativo </label></td>
				    				<td>
										<select id="ativo" class="form-control">
										<option value='S'>Sim</option>
										<option value='N'>Não</option>
									</td>
							  	</tr>
										<tr>
											<td colspan="2">
												<div id="panel_respuesta_usuario"></div>
											</td>
										</tr>
										<tr>
				    				<td colspan="2" align="center">
				    					<button class="btn btn-success btn-md" onclick="btn_guardar_dato_usuario(<?php echo $_SESSION['cod']; ?>);"> Registrar </button>
				    				</td>
				    			</tr>
				    		</table>
						</td>
					</tr>
				</table>
				<a class="btn btn-info btn-md" href="vista_menu.php" onclick="btn_listar_datos()"> Voltar para Entradas e Saídas </a>
				<a class="btn btn-info btn-md" href="vista_menu_parametros.php" onclick="btn_listar_datos_parametros()"> Ir para parâmetros </a>
			</div>
    </div>
    <div class="col-lg-12 col-md-12 xs-12">
    	<h3 align="center"> Listado dados </h3>
    	<button class="btn btn-info btn-md" onclick="btn_listar_datos_usuario(<?php echo $_SESSION['cod']; ?>);"> Listar </button>
        <button class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal_selector_usuario"> Selecinar </button>
    	<div id="panel_listado_usuario">
    		<!-- Panel de datos -->

    	</div>
    </div>
	</div>

</body>
</html>

<!-- Modal -->
<div id="myModal_selector_usuario" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #084B8A; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Selector </h4>
      </div>
      <div class="modal-body">
        <p> Seleccion </p>
	    <select class="form-control" id="select_usuario" onchange="select_usuario();">
        <option value=""> Seleccione </option>
            <?php

            require '../conector/conexion.php';

            $query = "Select * From interacao order by 1";

			$sql = mysqli_query($conn, $query);

			while($row_s = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
                $codinteracao = $row_s['codinteracao'];
                $entrada = $row_s['entrada'];
                ?>

                <option value="<?php echo $codinteracao; ?>"> <?php echo $entrada; ?></option>

                <?php
            }

            ?>
        </select>
        <div id="panel_selector_usuario"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" onclick="btn_eliminar_dato_usuario();"> Eliminar </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"> Cerrar </button>

      </div>
    </div>

  </div>
</div>
