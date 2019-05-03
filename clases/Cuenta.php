<?php

class Cuenta
{
    public $nroCuenta;
    protected $idCliente;
    protected $saldo;

    function __construct($nroCuenta,$idCliente,$saldo)
    {
        $this->nroCuenta = $nroCuenta;
        $this->idCliente = $idCliente;
        $this->saldo = $saldo;
    }

    function saldoCuenta(){
        return $this->saldo;
    }

    function realizarDeposito($monto){
        if($monto>0){
            // $this->saldo = $this->saldo + $monto;
            $this->saldo += $monto;
        }else{
            echo "ingrese monto mayor a 0";
        }
    }

    function realizarRetiro($monto){
        if($monto>0){
            // $this->saldo = $this->saldo + $monto;
            $this->saldo -= $monto;
        }else{
            echo "ingrese monto mayor a 0";
        }
    }

    function getCliente(){
        return $this->idCliente;
    }
    
    function conectar() {
        $conn = new mysqli('localhost', 'root', 'jupit3r', 'tp3objetos');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            echo "error de conexion a la base";
        }
        return $conn;
    }

    

}