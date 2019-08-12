<?php
echo "teste";
if (!empty($_POST) AND (empty($_POST['login']) OR empty($_POST['senha']))) {
    header("Location: index.php"); exit;
}
// session_start inicia a sessão
//session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
echo $login = $_POST['login'];
echo $senha = $_POST['senha'];
// as próximas 3 linhas são responsáveis em se conectar com o bando de dados.
require 'conector/conexion.php';

$query = "select u.*, (select count(*) as num from usuario WHERE email = '$login' AND senha = '$senha' LIMIT 1) as num from usuario u WHERE email = '$login' AND senha = '$senha' LIMIT 1";

$sql = mysqli_query($conn, $query);
$row = mysqli_fetch_array($sql);
$result = $row['num'];
$cod = $row['codusuario'];
$email = $row['email'];
$tel = $row['telefone'];

if($result >= 1)
{
      // Se a sessão não existir, inicia uma
      if (!isset($_SESSION)) session_start();
      // Salva os dados encontrados na sessão


      $_SESSION['cod'] = $cod;
      $_SESSION['email'] = $email;
      $_SESSION['telefone'] = $tel;
      $_SESSION['senha'] = $senha;
      header('location:vista/vista_menu.php');
//echo "correto";
} else {
  unset ($_SESSION['login']);
  unset ($_SESSION['senha']);
header('location:index.php');
//echo "incorreto!";
  }
?>
