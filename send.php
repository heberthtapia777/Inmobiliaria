<?php
//Configuracion de la conexion a base de datos
  $bd_host = "gator4225.hostgator.com"; 
  $bd_usuario = "hosting_inmoAdmi"; 
  $bd_password = "jXd#94{,Di%t"; 
  $bd_base = "hosting_inmoproy"; 
 
/*$con = mysql_connect($bd_host, $bd_usuario, $bd_password); 
mysql_select_db($bd_base, $con); */
sleep(1);

$mysqli = new mysqli("$bd_host", "$bd_usuario", "$bd_password", "$bd_base");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
mysqli_select_db($mysqli, $bd_base); 

//variables POST
  $nom=$_POST['name'];
  $telf=$_POST['phone'];
  $correo=$_POST['email'];

//////////////********************************/
$sql = "select * from suscriptores where Telefono='$telf' or correo='$correo'";
$result = mysqli_query($mysqli, $sql);

// Validamos si hay resultados
 if(mysqli_num_rows($result)>0)
 {
	 // Si es mayor a cero imprimimos que ya existe el usuario
  	echo "$nom ;( - el numero de telefono ó correo ya estan registrados, por favor intenta con otros datos.";
 }
	 else
	 {
	// Si no hay resultados, ingresamos el registro a la base de datos
	//registra los datos del empleados
	  $sql="INSERT INTO suscriptores (Nombre, Telefono, correo) VALUES ('$nom', '$telf', '$correo')";
	  mysqli_query($mysqli,$sql) or die('Error. '.mysql_error());

	  echo 'Gracias tu registro fue realizado correctamente!';

	  $mysqli->close();

	}
?>