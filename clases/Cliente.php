<?php
require("Persona.php");

class Cliente extends Persona
{
    protected $idCliente;

    function __construct($idCliente,$dni,$nombre,$apellido)
    {
        parent::__construct($dni,$nombre,$apellido);
        $this->idCliente = $idCliente;
    }

    function mostrarObjeto()
    {
        echo "idCliente: ". $this->idCliente ."<br>";
        parent::mostrarObjeto();
    }

}

$datos = $_POST;
//carguen el objeto y muestrenlo con mostrar objeto

?>
<a href="../index.php"  class="btn btn-info">volver</a>
