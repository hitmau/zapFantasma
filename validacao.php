<?php

  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
      header("Location: index.php"); exit;
  }

  // Tenta se conectar ao servidor MySQL
 require '../conector/conexion.php';
  // Tenta se conectar a um banco de dados MySQL
  mysql_select_db('usuarios') or trigger_error(mysql_error());

  $usuario = mysql_real_escape_string($_POST['usuario']);
  $senha = mysql_real_escape_string($_POST['senha']);

  // Validação do usuário/senha digitados
  $q = "SELECT `email`, `senha`FROM `usuario` WHERE (`email` = '".$usuario ."') AND (`senha` = '". sha1($senha) ."') LIMIT 1";

  $sql = mysqli_query($conn, $q);
  //$row = mysqli_fetch_array($sql);

 echo $result = $row['soma'];

  $query = mysql_query($sql);
  if (  $row = mysqli_fetch_array($sql) != 1) {
      // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
      echo "Login inválido!"; exit;
  } else {
      // Salva os dados encontados na variável $resultado
echo "Login valido!"; exit;
      //$resultado = mysql_fetch_assoc($query);
  }

  ?>
