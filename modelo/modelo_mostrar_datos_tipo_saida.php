<?php

$codinteracao = $_POST['codinteracao'];
$codusuario = $_POST['cod'];

?>
 <select class="form-control" id="stipo">
   <option value=""> Selecione tipo de serviço </option>
       <?php
         require '../conector/conexion.php';
         $query = "select distinct pt.tipo as tipo, pt.obs as obs from parametros pt inner join parametros ps on (ps.tipo = pt.parametro) where ps.parametro = 'servconv' and ps.ativo ='S'";
         $sql = mysqli_query($conn, $query);
           while($row_p = mysqli_fetch_array($sql, MYSQLI_ASSOC)){

             $codparametros = $row_p['codparametros'];
             $codtipo_p = $row_p['tipo'];
             $obs = $row_p['obs'];
       ?>
   <option value="<?php echo $codtipo_p; ?>"> <?php echo $obs; ?></option>
       <?php
           }
       ?>
   </select>
   <!---select p.tipo as tipo, p.obs as obs from parametros p left join interacao i on (p.parametro = i.servico) where parametro = i.servico and codinteracao = $codinteracao";
