<?php
require("Cuenta.php");

class CuentaCorriente extends Cuenta
{
    protected $maxDescubierto;

    function __construct($nroCuenta, $idCliente, $saldo,$maxDescubierto)
    {
        parent::__construct($nroCuenta,$idCliente,$saldo);
        $this->$maxDescubierto = $maxDescubierto;
    }
    
    function save() {
        $conn = $this->conectar();
        $sql = "insert into cuenta_corriente(cliente_id,saldo,descubierto) values($this->idCliente,$this->saldo,$this->maxDescubierto)";
        if ($conn->query($sql) === true) {
            echo "<h1>Sus datos fueron guardados</h1>";
            $this->mostrarObjeto();
        }
    }
    


}
class CajaAhorro extends Cuenta
{
    function __construct($nroCuenta, $idCliente, $saldo) {
        parent::__construct($nroCuenta, $idCliente, $saldo);
    }
            
    function save() {
        $conn = $this->conectar();
        $sql = "insert into caja_ahorro(cliente_id,saldo) values($this->idCliente,$this->saldo)";
        if ($conn->query($sql) === true) {
            echo "<h1>Sus datos fueron guardados</h1>";
            echo "<a href='vista_cuenta.php'>crear otra cuenta</a>";
//            $this->mostrarObjeto();
        }
    }
    
}
session_start();

$datos = $_POST;
$cliente_id = $_SESSION['cliente_id'];
//$cliente_id = 1;
$saldo = $datos['saldo'];
$opcion = $datos['cuenta'];
$maxDescubierto = $datos['descubierto'];
if($opcion==1){
    $cuenta = new CajaAhorro(null,$cliente_id,$saldo);
}else if($opcion==2){
    $cuenta = new CuentaCorriente(null,$cliente_id,$saldo,$maxDescubierto);
}
$cuenta->save();

