<?php

 $codusuario = $_POST['$cod'];

require '../conector/conexion.php';

$query = "Select count(*) as count From login where codusuario = $codinteracao order by 1";
$sql = mysqli_query($conn, $query);
$row_u = mysqli_fetch_array($sql, MYSQLI_ASSOC)
$count = $row_u['count'];
if ($count == 0){
  $query = "insert into login(codusuario, start, data) values ($codusuario, 'S', now())";
  $sql = mysqli_query($conn, $query);
} else if ($count > 0){
  $query = "select * from login where codlogin = (SELECT max(codlogin) FROM `login` WHERE codusuario = $codusuario)";
  $sql = mysqli_query($conn, $query);
  $row_s = mysqli_fetch_array($sql, MYSQLI_ASSOC);
  $start = $row_s['start'];
  $codlogin =$row_s['codlogin'];
  if ($start == "S"){
    $query = "update from codlogin set start = 'N' where codlogin = $codlogin";
    $sqlupdate = mysqli_query($conn, $query);
  } else {
    $query = "insert into login(codusuario, start, data) values ($codusuario, 'S', now())";
    $sql = mysqli_query($conn, $query);
  }
}
?>
