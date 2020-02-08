<?php
$cod = $_POST['cod'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha1'];
$ativo = $_POST['ativo'];

 require '../conector/conexion.php';

$new1 = "select max(codusuario) + 1 as m from usuario";
$sql1 = mysqli_query($conn, $new1);
$row1 = mysqli_fetch_array($sql1);
$new = $row1['m'];

$new2 = "select count(*) as emailexistente from usuario where email = '$email'";
$sql2 = mysqli_query($conn, $new2);
$row2 = mysqli_fetch_array($sql2);
$new3 = $row2['emailexistente'];

if ($new3 > 0)
{
  echo " > O e-mail ($email) já está cadastrado em nossa base de dados, informe outro!";
} else
{

    $usu = "insert into usuario (codusuario, nome, email, telefone, senha, ativo, cod, data, ddd) values ($new, '$nome', '$email', '$telefone', '$senha', '$ativo', $cod, now(), 0)";
    $grava = mysqli_query($conn, $usu);

    if($grava == TRUE)
    {
        //echo "Novo usuário inserido com sucesso XD";

        $contatodos = "insert into `contato` (`nome`, `ativo`, `cadastro`, `data`, `codusuario`) VALUES ('todos', 'S', 'S', now(), $new)";
        $ctt = mysqli_query($conn,$contatodos);

            if($ctt == TRUE)
            {
                //echo " > Novo contato Todos inserido com sucesso XD";

                $interacaos = "select distinct i.entrada as entrada, i.tipo as tipo from interacao i where tipo = '$' order by 1 desc";
                $sql = mysqli_query($conn, $interacaos);

                while($row = mysqli_fetch_array($sql))
                {
                  	$ientrada = $row['entrada'];
                  	$itipo = $row['tipo'];
                    $newa = "select max(codinteracao) + 1 as n from interacao";
                    $sql2 = mysqli_query($conn, $newa);
                    $row2 = mysqli_fetch_array($sql2);
                    $newi = $row2['n'];

                    $interacaoi = "insert into `interacao` (`codinteracao`, `entrada`, `tipo` , `ativo`, `codusuario`) VALUES ($newi, '$ientrada', '$itipo','S', $new)";
                    $ii = mysqli_query($conn,$interacaoi);

                    if($ii != TRUE)
                    {
                      echo "Erro na nova interação:(";
                    }

                    $saida = "insert into saida (codinteracao, codsaida, saida, tipo, ativo) values ($newi, 1, 'Registro fixo do sistema', '=', 'S')";
                    $ss = mysqli_query($conn,$saida);

                    if($ss != TRUE)
                    {
                      echo "Erro na saida:(";
                    }
                }

                //select_parametros
                $pars = "SELECT distinct tipo, obs, parametro FROM `parametros` WHERE editavel = 'S'";
                $sql_p = mysqli_query($conn, $pars);

                while($row_p = mysqli_fetch_array($sql_p)){
                	$ptipo = $row_p['tipo'];
                	$pobs = $row_p['obs'];
                  $ppar = $row_p['parametro'];

                  if ($ptipo == 'numerico'){
                    $parametros = "INSERT INTO `parametros` (`data`, `tipo`, `obs`, `parametro`, `ativo`, `editavel`, `codusuario`) VALUES (now(), '$ptipo', '$pobs', '$ppar', '0', 'S', $new)";
                    $pp = mysqli_query($conn,$parametros);
                  } else {
                    $parametros = "INSERT INTO `parametros` (`data`, `tipo`, `obs`, `parametro`, `ativo`, `editavel`, `codusuario`) VALUES (now(), '$ptipo', '$pobs', '$ppar', 'N', 'S', $new)";
                    $pp = mysqli_query($conn,$parametros);
                  }
                }
                if($pp != TRUE)
                {
                  echo "Erro na interacao:(";
                }
        } else
        {
          echo "Erro no contato :( ";
        }
      echo "Novo usuário inserido com sucesso XD";
    } else
    {
      echo "Erro no novo usuário :( ";
    }
}
?>
