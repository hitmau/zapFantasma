<?php

 $codusuario = $_POST['cod'];
 $entrada = $_POST['entrada'];
 $itipo = $_POST['itipo'];
 $tiposaida = $_POST['tiposaida'];
 $msganterior = $_POST['msganterior'];
 $iativo = $_POST['iativo'];
 /*
echo "iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii";
 echo $codusuario;
 echo $entrada;
 echo $itipo;
 echo $tiposaida;
 echo $msganterior;
 echo $iativo;

*/

 require '../conector/conexion.php';

$query = "INSERT INTO `interacao` (`entrada`, `tipo`, `ativo`, `codusuario`, `tiposaida`, `ref`) VALUES ('$entrada', '$itipo', '$iativo', $codusuario, '$tiposaida', '$msganterior')";
$sql = mysqli_query($conn, $query);

//echo $query;

if(empty($sql)){

  echo "Erro, campos vazios!";

  if(empty($entrada)){
    echo " Falta compo: Entrada!";
  }
  if(empty($itipo)){
    echo " Falta compo: Tipo!";
  }
  if(empty($iativo)){
    echo " Falta compo: Ativo!";
  }
  if(empty($codusuario)){
    echo " Falta compo: Codusuario!";
  }
  if(empty($tiposaida)){
    echo " Falta compo: TipoSaida!";
  }
  if(empty($msganterior)){
    echo " Falta compo: Msg Anterior!";
  }
  //echo $_POST['entrada'];
} else if($sql == TRUE) {
  echo "Registro inserido XD";
} else {
  echo $sql;
  echo " Erro!";
}


?>
