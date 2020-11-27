<?php
    require_once("Vigues.php");
    require_once("Extranjero.php");
    
    class Noria{
        const TAMANHO_NORIA = 5;
        public $pasajeros = array(); //array de vigueses & extrajeros
        public static $entradas = 0;

        public function __constructor()
        {            
        }
        
        public function ocupacion()
        {
            return count($this->pasajeros);
        }

        public function inicioViaje($persona)
        {
            if(count($this->pasajeros) < self::TAMANHO_NORIA){   
                if($persona->getEdad()<18){
                    $this->nuevoPasajero($persona);                                            
                }else{
                    if($this->comprobarDni($persona->getDni())) {
                        $this->nuevoPasajero($persona);                                                                                                                                
                    }                                            
                }                                                                      
            }else{
                print "No hay plazas libres<br>";
            }
        }

        public function nuevoPasajero($persona){
            for ($i=0; $i < self::TAMANHO_NORIA; $i++) { 
                if(empty($this->pasajeros[$i])){                    
                    $this->pasajeros[$i] = $persona;
                    self::$entradas++;
                    //print "Nuevo pasajero: ".$persona->getNombre()."<br>";
                    return true;
                }
            }
            return false;
        }

        public function comprobarDni($dni)  //comprobar se dni é válido & se hai algún pasaxeiro co mesmo DNI
        {
            if(strlen($dni) == 9 && $dni[8] >= 'A' && $dni[8] <= 'Z' && is_numeric(substr($dni, 0,7))){
                for($i = 0; $i < self::TAMANHO_NORIA; $i++){
                    if(!empty($this->pasajeros[$i]) && $this->pasajeros[$i]->getDni() == $dni){
                        print "Ya existe unha persona con ese dni. ¿Terrorista...?<br>";
                        return false;
                    }                    
                }
                return true;      
            }else{
                print "Dni no válido. ¿Terrorista...?<br>";
                return false;
            }
        }        

        public function beneficioViaje()
        {
            $acu = 0;
            for($i=0; $i < self::TAMANHO_NORIA; $i++){
                if(!empty($this->pasajeros[$i])){
                    if($this->pasajeros[$i]->getEdad() > 3){                        
                        if($this->pasajeros[$i] instanceof Vigues){
                            if(!$this->pasajeros[$i]->getPassVigo()){
                                if($this->pasajeros[$i]->getEdad() >=18 && $this->pasajeros[$i]->getEdad() <= 64){
                                    $acu+=4;
                                }else{
                                    $acu+=2;
                                }
                            }    
                        }else{
                            if($this->pasajeros[$i]->getEdad() >= 18 && $this->pasajeros[$i]->getEdad() <= 64){
                                $acu+=7;
                            }else{
                                $acu+=5;
                            }
                        }       
                    }                                                 
                }
            }
            return $acu;
        }

        public function listarVigueses()
        {
            for ($i=0; $i < self::TAMANHO_NORIA; $i++) { 
                if(!empty($this->pasajeros[$i])){
                    if($this->pasajeros[$i] instanceof Vigues){                                     
                        $this->listar($i);
                    }
                }
            }
        }

        public function listarPasajeros(){
            for ($i=0; $i < self::TAMANHO_NORIA ; $i++) {
                if(!empty($this->pasajeros[$i])){                                        
                    $this->listar($i);        
                }                                       
            }
        }
        
        public function listarMenores() {
            for ($i=0; $i < self::TAMANHO_NORIA; $i++) { 
                if(!empty($this->pasajeros[$i])){
                    if($this->pasajeros[$i]->getEdad()<18){                
                        $this->listar($i);
                    }
                }
            }
        }

        public function listar($i)
        {
            print "Nombre: ".$this->pasajeros[$i]->getNombre()."<br>";
            print "Edad: ".$this->pasajeros[$i]->getEdad()."<br>";
            print "DNI: ".$this->pasajeros[$i]->getDni()."<br>";
        }

        public function finViaje($persona)
        {
            for ($i=0; $i < self::TAMANHO_NORIA; $i++) {                 
                if(!empty($this->pasajeros[$i])){
                    if($persona->getEdad()>=18){
                        if(strcmp($this->pasajeros[$i]->getDni(), $persona->getDni()) == 0){        
                            unset($this->pasajeros[$i]);
                        }
                    }else{
                        if(strcmp($this->pasajeros[$i]->getNombre(), $persona->getNombre()) == 0 && 
                                    $this->pasajeros[$i]->getEdad() == $persona->getEdad()){
                            unset($this->pasajeros[$i]);
                        }
                    }                    
                }                                     
            }            
        }

        public function mostrarDatos()
        {            
            print "<br><b>Pasajeros:</b><br>";
            $this->listarPasajeros();
            print "<br><b>Menores:</b><br>";
            $this->listarMenores();
            print "<br><b>Vigueses:</b><br>";
            $this->listarVigueses();
            print "<br><b>Ganancias: </b>".$this->beneficioViaje()."<br>";
        }
    }
   
?>
