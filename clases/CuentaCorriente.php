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


}
class CajaAhorro extends Cuenta
{
    
}
