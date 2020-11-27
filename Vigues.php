<?php
    require_once("Persona.php");

    class Vigues extends Persona{
        protected $passVigo;

        public function __construct($nombre, $edad, $dni, $passVigo)
        {
            parent::__construct($nombre, $edad, $dni);
            $this->passVigo = $passVigo;
        }

        public function getPassVigo()
        {
            return $this->passVigo;
        }
    }
?>