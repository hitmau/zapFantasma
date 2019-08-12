<?php
echo "teste";

 $codusuario = $_POST['cod'];

require '../conector/conexion.php';

//$query = "select * from usuario where codusuario = $codusuario";
$query = "select * from imagem where codusuario = $codusuario";
$sql = mysqli_query($conn, $query);

while($row_t = mysqli_fetch_array($sql, MYSQLI_ASSOC)){

  $uucodusuario = $row_t['codusuario'];
  //$uemail = $row_t['email'];
  //$telefone = $row_t['telefone'];
  //$uativo = $row_t['ativo'];
  $imagem = $row_t['imagem'];
  $diretoria = "../start/"; // esta linha não precisas é só um exemplo do conteudo que a variável vai ter
  // selecionar só .jpg

  header("content-type: image/jpeg");
	echo $imagem;
	flush();
  $imagens = glob($diretoria . "*.jpg");
?>
<h4> Datos del usuario para examinar </h4>
<table class="table table-condensed">
	<tr>
		<td> entrada : </td>
<?php
  // fazer echo de cada imagem
/*
  foreach($imagens as $imagem){

  $pattern =  . '/';//Padrão a ser encontrado na string $tags
  echo $pattern;
  echo "    ";
  echo $imagem;
if (preg_match($pattern, $imagem)) {
  //echo 'Tag encontrada';
    //echo '<td><img width="100%" border="0px" src="'.$imagem.'" />';
  }
}
  //echo $dir = "../start/$utelefone.jpg";
*/
}

?>
<td><img width="100%" border="0px" src="<?php echo "imagem"; ?>" />
	</tr>
</table>
