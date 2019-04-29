<?php
class Banco 
{
    public $coleccionCuentaCorriente;
    public $coleccionCajaAhorro;
    public $coleccionClientes;




    function __construct($coleccionCuentaCorriente,$coleccionCajaAhorro,$coleccionClientes)
    {
        $this->coleccionCuentaCorriente = $coleccionCuentaCorriente;
        $this->coleccionCajaAhorro = $coleccionCajaAhorro;
        $this->coleccionClientes = $coleccionClientes;
    }

    function incorporarCliente($cliente){
        $this->coleccionClientes[]=$cliente;
    }

    function incorporarCuenta($cuenta){
        $clienteCuenta = $cuenta->getCliente();
        if($this->existeCliente($clienteCuenta) && !$this->existeCuentaCorriente($cuenta) && !$this->existeCajaAhorro($cuenta)){
                if($cuenta instanceof CuentaCorriente){
                    $this->coleccionCuentaCorriente[] = $cuenta;
                }else if($cuenta instanceof CajaAhorro){
                    $this->coleccionCajaAhorro[] = $cuenta;
                }
        }
        
    }

    function realizarDeposito($nroCuenta,$monto){
        foreach ($this->coleccionCajaAhorro as $cajaAhorro) {
            if($cajaAhorro->nroCuenta == $nroCuenta){
                $cajaAhorro->realizarDeposito($monto);
            }
        }
        foreach ($this->coleccionCuentaCorriente as $cuentaCorriente) {
            if($cuentaCorriente->nroCuenta == $nroCuenta){
                $cuentaCorriente->realizarDeposito($monto);
            }
        }

    }

    function realizarRetiro($nroCuenta,$monto){
        foreach ($this->coleccionCajaAhorro as $cajaAhorro) {
            if($cajaAhorro->nroCuenta == $nroCuenta){
                $cajaAhorro->realizarRetiro($monto);
            }
        }
        foreach ($this->coleccionCuentaCorriente as $cuentaCorriente) {
            if($cuentaCorriente->nroCuenta == $nroCuenta){
                $cuentaCorriente->realizarRetiro($monto);
            }
        }

    }

    function existeCliente(Cliente $clienteCuenta){
        foreach ($this->coleccionClientes as $cliente) {
            if($clienteCuenta==$cliente){
                return true;
            }
        }
        return false;
    }

    function existeCajaAhorro(Cuenta $cuentaAgregar){
        foreach ($this->coleccionCajaAhorro as $cajaAhorro) {
            if($cuentaAgregar->nroCuenta==$cajaAhorro->nroCuenta){
                return true;
            }
        }
        return false;
    }

    function existeCuentaCorriente(Cuenta $cuentaAgregar){
        foreach ($this->coleccionCuentaCorriente as $cuentaCorriente) {
            if($cuentaAgregar->nroCuenta==$cuentaCorriente->nroCuenta){
                return true;
            }
        }
        return false;
    }


    function getCtaPorNro($nroCuenta)
    {
        foreach($this->coleccionCajaAhorro as $cuenta)
        {
            if($cuenta->nroCuenta == $nroCuenta){
                return $cuenta;
            }
        }
        foreach($this->coleccionCuentaCorriente as $cuenta)
        {
            if($cuenta->nroCuenta == $nroCuenta){
                return $cuenta;
            }
        }
        return null;
    }

}

