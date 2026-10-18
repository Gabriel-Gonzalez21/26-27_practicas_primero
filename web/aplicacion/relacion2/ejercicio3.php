<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$caracteres = "asdfgghjkklññooyttyrerwqASDDFFEAQFAFFASFASSFA123456789";
$nuevaCadena = [];

//Rellenar el nuevo array
for ($x = 0; $x < 20; $x++){
    
    $IndiceCaracterRandom = mt_rand(0, strlen($caracteres)-1);
    $nuevaCadena[$x] = $caracteres[$IndiceCaracterRandom];
}


//Apartado b
$nuevaCadena2 = "";

        while(strlen($nuevaCadena2) < 20){

            $codigoAscii = mt_rand(48, 122);

            if(
                ($codigoAscii >= 48 && $codigoAscii <= 57) ||
                ($codigoAscii >= 65 && $codigoAscii <= 90) ||
                ($codigoAscii >= 97 && $codigoAscii <= 122)
            ){
                $nuevaCadena2 .= chr($codigoAscii);
            }
        }



$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 2",
        "LINK" =>"/aplicacion/relacion2/index.php"
    ],
    [
        "TEXTO"=>"Ejercicio 3",
        "LINK" =>""
    ]
];



//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $barraUbi);
cuerpo($nuevaCadena, $nuevaCadena2); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {
       
}
//vista
function cuerpo($nuevaCadena, $nuevaCadena2)
{
?>
    <br><br>

   <h2>Ejercicio 3</h2>

   <?php

        echo "<h3>Apartado A</h3>";
        foreach($nuevaCadena as $caracter){
            echo $caracter;
        }
        
        echo "<h3>Apartado B</h3>";
        echo $nuevaCadena2;
        
        
   ?>
   
<?php
}
