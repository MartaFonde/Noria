<?php

    abstract class Persona{
        protected $nombre;
        protected $edad;
        protected $dni;

        public function __construct($nombre, $edad, $dni)
        {
            $this->nombre = $nombre;
            $this->edad = $edad;
            $this->setDni($dni);
        }

        public function setDni($dni)
        {
            if($this->edad < 18){
                $this->dni = 0;
            }else{               
                $this->dni = strtoupper($dni);                                
            }
        }

        public function getDni()
        {
            return $this->dni;
        }

        public function getEdad()
        {
            return $this->edad;
        }

        public function getNombre()
        {
            return $this->nombre;
        }
    }

?>