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

	<script type="text/javascript" src="../librerias/bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="../librerias/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../controlador/control_usuario.js"></script>

</head>
<body onload="btn_listar_datos_parametros(<?php echo $_SESSION['cod']; ?>);">
	<h1> Cadastra parâmetros do sistema </h1>

	<div class="row" style="margin: 10px; padding: 0px;">


    <div class="col-lg-12 col-md-12 xs-12">
    	<h3 align="center"> Parametros </h3>
    	<button class="btn btn-info btn-md" onclick="btn_listar_datos_parametros(<?php echo $_SESSION['cod']; ?>);"> Listar </button>
        <button class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal_selector_parametros"> Selecinar </button>
    	<div id="panel_listado_parametros">
    		<!-- Panel de datos -->

    	</div>
			<a class="btn btn-info btn-md" href="vista_menu.php"> Voltar para Entradas e Saídas </a>
    </div>

	</div>

</body>
</html>

<!-- Modal -->
<div id="myModal_selector_parametros" class="modal fade" role="dialog">
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
        <div id="panel_selector"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" onclick="btn_eliminar_dato_parametros();"> Eliminar </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"> Cerrar </button>

      </div>
    </div>

  </div>

</div>
