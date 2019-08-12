<?php
/*
    $bd_host = "localhost";
    $bd_usuario = "root";    // el alias de la cuenta creada de la base de datos
    $bd_password = "";          // la contrasena de la cuenta
    $bd_base = "bd";   // el nombre de la base de datos

	$con = mysqli_connect($bd_host, $bd_usuario,$bd_password, $bd_base);
	 //mysql_select_db($bd_base, $con);
	 mysql_set_charset('utf8');

      if($con==TRUE){
       //echo "coneccion existosa";
      }
*/

$servername = "localhost";
$database = "bd";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

// Set encoding to match PHP script encoding.
mysqli_set_charset($conn, 'utf8');

//mysqli_close($conn);
?>
