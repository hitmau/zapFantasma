<?php
 $scodinteracao = '';
 $saida = '';
 $stipo = '';
 $sativo = '';

 if (empty($_POST['scodinteracao'])) {
       $errors[] = 'Falta entrada.';
   }
else {
$scodinteracao = $_POST['scodinteracao'];
}

  if (empty($_POST['saida'])) {
        $errors[] = 'Falta saída';
    }
 else {
 $saida = $_POST['saida'];
 }

 if (empty($_POST['stipo'])) {
        $errors[] = 'Falta o tipo que depende da entrada';
    }
 else {
 $stipo = $_POST['stipo'];
 }

 if (empty($_POST['sativo'])) {
        $errors[] = 'Falta ativo que sempre vai ter XD';
    }
 else {
 $sativo = $_POST['sativo'];
 }


 require '../conector/conexion.php';

   //Pega max
   $sql = mysqli_query($conn, "select max(codsaida) + 1 as mais from saida where codinteracao = $scodinteracao");
   while($row_p = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
     $max = $row_p['mais'];
   }
   if(empty($max)){
     $max = 1;
   }
if (empty($errors)) {
   //Insert
   $nsql = "insert into saida (codinteracao, codsaida, saida, tipo, ativo) values ($scodinteracao, $max, '$saida', '$stipo', '$sativo')";

	 $sql = mysqli_query($conn, $nsql);

if($sql == TRUE){
echo "Registro Correcto XD ";
}
} else {
  foreach ($errors as $key => $value) {
      // $arr[3] será atualizado com cada valor de $arr...
      echo "{$value}";
      echo "\n";
  }
}

?>
