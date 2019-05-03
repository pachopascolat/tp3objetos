<?php
require("Persona.php");

class Cliente extends Persona {

    protected $idCliente;

    function __construct($idCliente, $dni, $nombre, $apellido) {
        parent::__construct($dni, $nombre, $apellido);
        $this->idCliente = $idCliente;
    }

    function mostrarObjeto() {
        echo "idCliente: " . $this->idCliente . "<br>";
        parent::mostrarObjeto();
    }

    function conectar() {
        $conn = new mysqli('localhost', 'root', 'jupit3r', 'tp3objetos');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            echo "error de conexion a la base";
        }
        return $conn;
    }

    function save() {
        $conn = $this->conectar();
        $sql = "insert into Cliente(dni,nombre,apellido) values($this->dni,'$this->nombre','$this->apellido')";
        if ($conn->query($sql) === true) {
            session_start();
            $_SESSION['cliente_id'] = $conn->insert_id;
            echo "<h1>Sus datos fueron guardados</h1>";
            $this->mostrarObjeto();
        }
    }

}

$datos = $_POST;
$dni = $datos['dni'];
$cliente = new Cliente(null, $datos['dni'], $datos['nombre'], $datos['apellido']);
//$cliente->mostrarObjeto();
$cliente->save();
//carguen el objeto y muestrenlo con mostrar objeto
?>
<a href="../vista_cuenta.php"  class="btn btn-info">volver</a>
