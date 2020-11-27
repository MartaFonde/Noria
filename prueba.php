<?php
    require_once("Noria.php");

    $noria = new Noria();
    $persona0 = new Vigues("0.Teresa Viguesa Pass 0€", 65, "1234567G", true);
    $noria->inicioViaje($persona0);
    $persona1 = new Vigues("1.Marcelino Vigues Pass 0€", 45, "12345678K", true);
    $noria->inicioViaje($persona1);
    
    // $noria->mostrarDatos();        

    $persona2 = new Extranjero("2.Ambrosio Extranjero 7€", 32, "89784556h");
    $noria->inicioViaje($persona2);
    $persona3 = new Vigues("3.Paloma Viguesa NoPass 2€", 17, "", false);
    $noria->inicioViaje($persona3);
    $persona4 = new Vigues("4.Sinesio Vigues NoPass 4€", 64, "52013258G", false);
    $noria->inicioViaje($persona4);

    $terrorista = new Vigues("2.Ambrosio Extranjero 7€", 32, "89784556H", true);
    $noria->inicioViaje($terrorista);

    $persona5 = new Vigues("5.Maricarmen Viguesa Pass 0€", 64, "14523698j", true);
    $noria->inicioViaje($persona5);
    $persona6 = new Extranjero("6.Teodora Extranjera 7€", 28, "44093131s");
    $noria->inicioViaje($persona6); //non hai prazas libres
    $persona7 = new Extranjero("7.Luisita Extranjera 0€", 3, "");   
    $noria->inicioViaje($persona7);        //non hai prazas libres
    
    $noria->mostrarDatos();

    $noria->finViaje($persona1);    //marcelino
    $noria->inicioViaje($persona7);     //agora si pode entrar luisita
    
    $noria->mostrarDatos();

    $noria->finViaje($persona2);   //ambrosio
    $noria->finViaje($persona3);    //paloma
    //$noria->mostrarDatos();

    $persona8 = new Vigues("8.Marisa viguesa NoPass 4€", 40, "89564712K", false);   
    $noria->inicioViaje($persona8);
    $noria->mostrarDatos();

    $noria->finViaje($persona4);    //sinesio
    $noria->finViaje($persona5);    //maricarmen
    $noria->finViaje($persona7);    //luisita
            
    $persona9 = new Extranjero("9.Lorenzo Extranjero 5€", 98, "55462222t");
    $noria->inicioViaje($persona9);
    $noria->mostrarDatos();

    $noria->finViaje($persona8);    
    $noria->finViaje($persona9);

    $noria->mostrarDatos();
    
    print "<br><b>ENTRADAS VENDIDAS TOTAL: ".noria::$entradas;
?>
