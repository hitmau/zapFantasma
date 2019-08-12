<?php

 $codusuario = $_POST['cod'];

require '../conector/conexion.php';


/*
if($sql2 == TRUE){
 echo "Edição realizada com sucesso! XD";
} else { echo "Erro!";}
*/
//$query = "select * from usuario where codusuario = $codusuario";
$query = "select * from imagem i inner join login l on (i.codusuario = l.codusuario) where codimagem = (select max(codimagem) as imagem from imagem where codusuario =$codusuario) and  codlogin = (select max(codlogin) from login where codusuario =$codusuario)";
$sql = mysqli_query($conn, $query);

while($row_t = mysqli_fetch_array($sql, MYSQLI_ASSOC)){

  //$uucodusuario = $row_t['codusuario'];
  //$uemail = $row_t['email'];
  //$telefone = $row_t['telefone'];
  $ativo = $row_t['start'];
  //update


//if ($ativo == "N"){
  //$query2 = "update login i set i.start = 'S' where i.codusuario = $codusuario order by codlogin limit 1";
  //$sql2 = mysqli_query($conn, $query2);
?>
<h3> Aponte a câmera do Whatsapp no código abaixo. </h3>
<table class="table table-condensed">
	<tr>
		<td> QrCode: </td>
<?php
 echo '<td><img src="data:image/jpeg;base64,' .  $row_t['imagem'] . '" /></td>';
 //flush();
 ?>
 <br>
 <button type="button" class="btn btn-success"  onclick="start_recarrega(<?php echo $codusuario; ?>);"> Atualizar do refresh </button>

</tr>
</table>
<?php

//}
}
 ?>
