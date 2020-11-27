<?php
    require_once("Persona.php");
    class Extranjero extends Persona{

        public function __construct($nombre, $edad, $dni)
        {
            parent::__construct($nombre, $edad, $dni);
        }
    }
?>