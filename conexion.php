<?
$hostname='localhost';
$database='proyecto';
$username='root';
$password='';

$conexion=mysqli_connect( "localhost", "root", "","zalego_db");


	if(mysqli_connect_errno()){
		die("Database connnection failed " . "(" .
			mysqli_connect_error() . " - " . mysqli_connect_errno() . ")"
				);
	}
?>