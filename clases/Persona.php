<?php

class Persona{

    protected $dni;
    protected $nombre;
    protected $apellido;

    function __construct(int $d, string $nom, string $apell)
    {
        $this->dni = $d;
        $this->nombre = $nom;
        $this->apellido = $apell;
    }

    function mostrarObjeto(){
        echo "dni: ". $this->dni . "<br>";
        echo "nombre: ". $this->nombre . "<br>";
        echo "apellido: ". $this->apellido . "<br>";
    }

}



//$miper = new Persona(1233456789,"pacho","pascolat");
//$miper->mostrarObjeto();


