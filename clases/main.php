<?php
require("Cliente.php");
require("CuentaCorriente.php");
require("Banco.php");

$miCliente = new Cliente(1,123,"Pacho","Pascolat");
$miCliente2 = new Cliente(2,234,"Raul","Lopez");
$miCajaAhorro = new CajaAhorro(1,$miCliente,100);
$miCuentaCorriente = new CuentaCorriente(2,$miCliente2,300,3000);
$miBanco = new Banco([],[],[]);
$miBanco->incorporarCliente($miCliente);
$miBanco->incorporarCuenta($miCajaAhorro);
$miBanco->incorporarCuenta($miCuentaCorriente);

$miBanco->incorporarCliente($miCliente2);
$miBanco->incorporarCuenta($miCuentaCorriente);
$miBanco->realizarDeposito(1,27000);
$miBanco->realizarDeposito(2,45000);
echo "saldo cuenta 1: " . $miBanco->coleccionCajaAhorro[0]->saldoCuenta() ."\n";
echo "saldo cuenta 2: " . $miBanco->coleccionCuentaCorriente[0]->saldoCuenta() ."\n";
$miBanco->realizarRetiro(1,25000);
$miBanco->realizarRetiro(2,46000);
echo "saldo cuenta 1: " . $miBanco->getCtaPorNro(1)->saldoCuenta() ."\n";
echo "saldo cuenta 2: " . $miBanco->getCtaPorNro(2)->saldoCuenta() ."\n";