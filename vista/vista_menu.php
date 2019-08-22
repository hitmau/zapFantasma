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
	$codusuario = $_SESSION['cod'];
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
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>

	<style type="text/css">

	        /*Definido cor das linhas pares*/
	        .full_table_list tr:nth-child(even) {background: #EEE}

	        /*Definindo cor das Linhas impáres*/
	        .full_table_list tr:nth-child(odd) {background: #FFF}

					.css-selector {font-family: 'Fira Sans Extra Condensed', sans-serif; font-size:15px;}

					.titulo {font-family: 'Fira Sans Extra Condensed', sans-serif; font-size:18px;}

	    </style>

</head>
<body onLoad="btn_listar_datos(<?php echo $_SESSION['cod']; ?>);">

		<form action="../logoff.php" method="post">
		<legend>sair</legend>
				<input type="hidden" id="sair">
				<input type="submit" value="Sair" />
		</form>

	  <h1>Página restrita</h1>
	  <p>Olá, <?php echo $_SESSION['email']; echo " = "; echo $_SESSION['cod']; ?>!</p>
		<?php
		require '../conector/conexion.php';
		$query = "select * from login where codlogin = (SELECT max(codlogin) FROM `login` WHERE codusuario = $codusuario)";
	  $sql = mysqli_query($conn, $query);
	  $row_s = mysqli_fetch_array($sql);
	  $start = $row_s['start'];
	  $codlogin =$row_s['codlogin'];
	  if ($start == "S"){
?>
<button class="btn btn-danger btn-xs" style="width: 100%; margin-top: 1%;" data-toggle="modal" data-target="#myModal_start" onclick="start_fin(<?php echo $_SESSION['cod']; ?>);"> Parar </button>
<?php
	  } else {
?>
<button class="btn btn-success btn-xs" style="width: 100%; margin-top: 1%;" data-toggle="modal" data-target="#myModal_start" onclick="start_ini(<?php echo $_SESSION['cod']; ?>);"> Iniciar </button>
<?php
	  }
?>
	<h1> Cadastra entradas de dados (cliente) </h1>
	<div class="row" style="margin: 0px; padding: 0px;">
    <div class="col-lg-12 col-md-12 xs-12">
    	<h3 align="center"> Registro de Dados </h3>
    	<div id="panel_registro" style="padding: 0%; box-shadow: 1px 2px 2px #A4A4A4; border:1px solid #A4A4A4;" align="center">
    		<!-- Panel de datos -->
				<table class="table table-condensed" style="width:100%;">
					<tr>
						<td>
							<h4 align="center"> Entrada </h4>
							<!-- Painel de entrada -->
				    		<table class="table table-condensed" style="width:100%;">
									<tr>
										<td> <label> Msg anterior </label></td>
										<td> <select style="width:500px;" class="form-control" id="msganterior" onchange="select_tipo(<?php echo $_SESSION['cod']; ?>);">
											   <option value=""> Sem msg anterior (msg inicial) </option>
							            <?php
													$codusuario = $_SESSION['cod'];
							            require '../conector/conexion.php';

							            $query = "SELECT entrada, saida FROM saida s inner join interacao i on (s.codinteracao=i.codinteracao) where s.ativo = 'S' and i.codusuario = $codusuario and i.tipo <> '$' order by 1";

										$sql = mysqli_query($conn, $query);

										while($row_s = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
							                $codinteracao = $row_s['entrada'];
							                $entrada = $row_s['saida'];
							                ?>

							                <option value="<?php echo $codinteracao; ?>"><?php echo "{" . $codinteracao  . "} - " . $entrada; ?></option>
							                <?php
							            }
							            ?>
							        </select>
										  </td>
								  </tr>
				    				<td> <label> Entrada </label></td>
				    				<td> <input type="text" id="entrada" style="width:500px;" class="form-control" placeholder="* Texto de entrada (use vírgula para definir mais de 1 palavra)"></td>
									</tr>
				    			<tr> <td> <label> Tipo de busca </label></td>
				    				<td>
										<select id="itipo" style="width:500px;" class="form-control">
											<option value=''>Como a entrada será encontrada?</option>
										<option value='='>Igual</option>
										<option value='%'>Contém</option>
									</td>
								</tr>
								<tr> <td> <label> Tipo de saída </label></td>
									<td>
									<select id="tiposaida" style="width:500px;" class="form-control" style="width:500px;">
									<option value=''>Comportamento das saídas selecionando esta entrada.</option>
									<option value='a'>Aleatória</option>
									<option value='t'>Todas as saídas</option>
								</td>
							</tr>
				    		<tr> <td> <label> Ativo </label></td>
				    				<td>
										<select id="iiiativo" style="width:500px;" class="form-control">
										<option value='S'>Sim</option>
										<option value='N'>Não</option>
									</td>
								</tr>

				    			<tr>
				    				<td colspan="2">
				    					<hr>
				    					<div id="panel_respuesta"></div>
				    				</td>
				    			</tr>
				    			<tr>
				    				<td colspan="2" align="center">
				    					<button class="btn btn-success btn-md" onclick="btn_guardar_dato(<?php echo $_SESSION['cod']; ?>);"> Registrar </button>
				    				</td>
				    			</tr>
				    		</table>
						</td>
						<td>
							<h4 align="center"> Saída </h4>
							<!-- Painel de saída -->
							<table class="table table-condensed" style="width:100%;">
								<tr>
									<td> <label> Resposta da entrada </label></td>
									<td> <select style="width:500px;"  class="form-control" id="scodinteracao" onchange="select_tipo(<?php echo $_SESSION['cod']; ?>);">
										   <option value=""> Selecione </option>
						            <?php
												$codusuario = $_SESSION['cod'];
						            require '../conector/conexion.php';

						            $query = "Select * From interacao where codusuario = $codusuario order by 1 desc";

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
									  </td>

							  </tr>
								<tr>
									<td> <label> Saída(s) </label></td>
									<td> <textarea id="ssaida" style="width:500px;" class="form-control" placeholder="* Resposta dada ao usuário." rows="4"></textarea></td>
							  </tr>
								<tr>
									<td> <label> Tipo de Saída </label></td>
									<td>
											<div id="panel_tipo"></div>
									</td>

							  </tr>
								<tr>
									<td><label> Ativo </label></td>
									<td><select id="sativo" style="width:500px;" class="form-control">
											<option value='S'>Sim</option>
											<option value='N'>Não</option>
											</select>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<hr>
										<div id="panel_respuesta"></div>
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<button class="btn btn-success btn-md" onclick="btn_guardar_dato_saida(<?php echo $_SESSION['cod']; ?>);"> Registrar </button>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<a class="btn btn-info btn-md" href="vista_menu_contatos.php" onclick="btn_listar_datos_contatos()"> Ir para Contados </a>
				<a class="btn btn-info btn-md" href="vista_menu_parametros.php" onclick="btn_listar_datos_parametros()"> Ir para parâmetros </a>
				<a class="btn btn-info btn-md" href="vista_menu_usuario.php" onclick="btn_listar_datos_usuario()"> Ir para Usuários </a>
			</div>
    </div>
    <div class="col-lg-12 col-md-12 xs-12">
    	<h3 align="center"> Listado dados </h3>
    	<button class="btn btn-info btn-md" onclick="btn_listar_datos(<?php echo $_SESSION['cod']; ?>);"> Listar </button>
        <button class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal_selector"> Selecinar </button>
    	<div id="panel_listado">
    		<!-- Panel de datos -->

    	</div>
    </div>
	</div>

</body>
</html>

<!-- Modal start -->
<div id="myModal_start" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #084B8A; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Selector </h4>
      </div>
      <div class="modal-body">
        <div id="panel_start"></div>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-danger" data-dismiss="modal"> Sair </button>

      </div>
    </div>

  </div>
</div>
