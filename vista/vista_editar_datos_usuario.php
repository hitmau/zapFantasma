<?php

$codusuario = $_POST['codusuario'];
$cod = $_POST['cod'];

require '../conector/conexion.php';

$query = "select nome, email, telefone, ativo, senha from usuario where codusuario = $codusuario";

$sql = mysqli_query($conn, $query);
$row = mysqli_fetch_array($sql);

//if($sql == TRUE){
//echo " > Nova saida tbm... XD";
//} else {echo "Erro :(";}

$nome = $row['nome'];
$email = $row['email'];
$telefone = $row['telefone'];
$ativo = $row['ativo'];
$senha = $row['senha'];

?>

<input type="hidden" id="icodusuario" value="<?php echo $codusuario; ?>">

<label for="nome"> Nome </label>
<input type="text" class="form-control" id="inome" placeholder="* Nome do contato " value="<?php echo $nome; ?>">

<label for="acontato"> E-mail </label>
<input type="text" class="form-control" id="iemail" placeholder="* Nome do contato " value="<?php echo $email; ?>">

<label for="senha"> Senha </label>
<input type="password" class="form-control" id="isenha" placeholder="* Nome do contato " value="<?php echo $senha; ?>">

<label for="acontato"> Telefone </label>
<input type="text" class="form-control" id="itelefone" placeholder="* Nome do contato " value="<?php echo $telefone; ?>">

<label> Ativo </label>
<select class="form-control" id="iativo">
	<?php if ($ativo == 'S') {
	?>	<option value='S'>Sim</option>
	  	<option value='N'>Não</option>
	<?php
} else {
	?>	<option value='N'>Não</option>
			<option value='S'>Sim</option>
	<?php
}
?>
		</select>
