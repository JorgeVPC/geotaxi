<?php

class DB_con
{
	function __construct()
	{
		$conn = mysqli_connect("ls-257a4f03e635bdc77ba39e3e076bb62d3f7637a9.ctungptxcpdz.us-east-1.rds.amazonaws.com:3306", "dbmasteruser", "60166572","db_geotaxi") or die ("No se ha podido conectar al servidor de Base de datos");
		//mysqli_select_db( $conn, "dbtuts" ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
	}
	public function login($usuario,$password)
	{
		$conn = mysqli_connect("ls-257a4f03e635bdc77ba39e3e076bb62d3f7637a9.ctungptxcpdz.us-east-1.rds.amazonaws.com:3306", "dbmasteruser", "60166572","db_geotaxi");
		$consulta="SELECT COUNT(*) as contar from users where usuario = '$usuario' and password ='$password'";
		$res = mysqli_query($conn, $consulta);
		$array = mysqli_fetch_array($res);
		mysqli_close($conn);
		return $array['contar'];
	}
	public function insert($fname,$lname,$email,$ci,$usuario,$password,$imagen)
	{
		$conn = mysqli_connect("ls-257a4f03e635bdc77ba39e3e076bb62d3f7637a9.ctungptxcpdz.us-east-1.rds.amazonaws.com:3306", "dbmasteruser", "60166572","db_geotaxi");
        $hash = $this->hashSSHA($password);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt
		$consulta="INSERT INTO persona VALUES('$ci','$fname','$lname','$email')";
		mysqli_query($conn, $consulta);
		$consulta2="INSERT INTO users VALUES('','$usuario','$password','$salt','$ci','$imagen','1')";
		$res = mysqli_query($conn, $consulta2);
		mysqli_close($conn);
		return $res;
	}
	
	public function select()
	{
		$conn = mysqli_connect("ls-257a4f03e635bdc77ba39e3e076bb62d3f7637a9.ctungptxcpdz.us-east-1.rds.amazonaws.com:3306", "dbmasteruser", "60166572","db_geotaxi");
		$res=mysqli_query($conn, "SELECT users.id_usuario, persona.nombre, persona.apellido, persona.email, persona.ci, users.usuario, users.password, users.imagen
FROM persona
INNER JOIN users ON persona.ci=users.ci_usuario;");
		mysqli_close($conn);
		return $res;
	}

	public function delete($id){
		$conn = mysqli_connect("ls-257a4f03e635bdc77ba39e3e076bb62d3f7637a9.ctungptxcpdz.us-east-1.rds.amazonaws.com:3306", "dbmasteruser", "60166572","db_geotaxi";
		$res=mysqli_query($conn, "DELETE a1, a2 FROM users AS a1 INNER JOIN persona AS a2
WHERE a1.ci_usuario=a2.ci AND a1.ci_usuario LIKE $id");
		mysqli_close($conn);
		return $res;
	}

	public function update($fname,$lname,$email1,$ci1,$usuario1,$password2,$imagen){
		$conn = mysqli_connect("ls-257a4f03e635bdc77ba39e3e076bb62d3f7637a9.ctungptxcpdz.us-east-1.rds.amazonaws.com:3306", "dbmasteruser", "60166572","db_geotaxi");
		mysqli_query($conn, "UPDATE users SET usuario='$usuario1', password='$password2', imagen='$imagen' WHERE ci_usuario='$ci1'");
		$res=mysqli_query($conn, "UPDATE persona SET nombre='$fname', apellido='$lname', email='$email1' WHERE ci='$ci1'");
		mysqli_close($conn);
		return $res;
	}
	public function hashSSHA($password) {
 
        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }
 
    public function checkhashSSHA($salt, $password) {
 
        $hash = base64_encode(sha1($password . $salt, true) . $salt);
 
        return $hash;
    }
}

?>
