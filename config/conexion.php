<?php 

$servername = "localhost";
$username = "admin";
$password = "master";
$dbname = "administrador";

// Crea la conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica si la conexión es exitosa
if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}
?>

<?php
class Conectar{
    protected $dbh;

    protected function Conexion(){
        try{
            $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=administrador","admin","master");
            return $conectar;
        }catch (Exeption $e){
            print "Error DB: " . $e->getMessage()."<br/>";
            die();
        }
    }

    public function set_names (){
        return $this->dbh->query("SET NAMES utf8'");
    }
}
?>

