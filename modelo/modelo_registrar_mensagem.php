<?php
 $ativo = $_POST['ativamsg'];
 $msg = $_POST['msgbv'];
 $codusuario = $_POST['cod'];

  if (empty($_POST['msg'])) {
        $errors[] = 'Enter your first name.';
  }

 require '../conector/conexion.php';

 $query = "SELECT codusuario, ativo, msg, ultimahora FROM mensagem WHERE codusuario = $codusuario limit 1";
 $sql = mysqli_query($conn, $query);
 while($row_t = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
  $codusuario1 = $row_t['codusuario'];
   $ativo1 = $row_t['ativo'];
   $msg1 = $row_t['msg'];
}
if (empty($codusuario1)) {
      $sql = '';
       if($msg == ''){
      	 echo " Vazio! ";
      	 //echo $_POST['entrada'];
       } else {
      	 $sql = mysqli_query($conn, "INSERT INTO `mensagem` (`codusuario`, `ativo`, `msg`, `ultimahora`) VALUES ($codusuario, '$ativo', '$msg', now())");
       }
       if ($sql == TRUE){
       echo "Registro de mensagem inserido XD";
      } else {echo "...";}
}
elseif ($ativo1 == $ativo && $msg1 == $msg){
  echo "Informações iguais, nada a fazer!";
}
else {
      $sql = '';
       if($msg == ''){
      	 echo " Vazio! ";
      	 //echo $_POST['entrada'];
       } else {
         //echo "UPDATE mensagem SET msg = '$msg', ativo = '$ativo' WHERE id = $codusuario;";
      	 $sql = mysqli_query($conn, "UPDATE mensagem SET msg = '$msg', ativo = '$ativo' WHERE codusuario = $codusuario;");
       }
       if ($sql == TRUE){
       echo "Registro de mensagem atualizado XD";
      } else {echo "...";}
}

?>
