<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 1",
        "LINK" =>"/aplicacion/relacion1/index.php"
    ],
    [
        "TEXTO"=>"Ejercicio 3",
        "LINK" =>""
    ]
];

$miArray = [];

$miArray = [
    1 => "hola",
    16 => "buena",
    54 => "tardes"
];

//Añadir el valor 34 al final
array_push($miArray , 34);

//Añadir los valores “cadena”, true, 1.345 en las posiciones “uno”, “dos” y “tres”
$miArray["uno"] = "cadena";
$miArray["dos"] = true;
$miArray["tres"] = 1.345;

//Rellenar la posición “ultima” con el array (1,34,”nueva”)
$miArray["ultima"] = [1,34,"nueva"];

//Hacer lo anterior usando una sola sentencia con array;
$miArray2 = array(
    1 => "hola",
    16 => "buena",
    54 => "tardes",
    55 => 34,
    "uno" => "cadena",
    "dos" => true,
    "tres" => 1.345,
    "ultima" => array(1, 34, "nueva")
);


//Hacer lo anterior usando una sola sentencia con [] 
$miArray3 = [
    1 => "hola",
    16 => "buena",
    54 => "tardes",
    55 => 34,
    "uno" => "cadena",
    "dos" => true,
    "tres" => 1.345,
    "ultima" => [1, 34, "nueva"]
];


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION",$barraUbi);
cuerpo($miArray, $miArray2, $miArray3); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {
       
}
//vista
function cuerpo($miArray, $miArray2, $miArray3)
{
?>
    <br><br>

   <h2>Ejercicio 3</h2>

    <?php

    //Mostrar el array
    echo "<h2>Contenido de miArray1:</h2>";
    foreach ($miArray as $elem){
        if (is_array($elem)){
            foreach($elem as $otroArray){
                echo " - ".$otroArray."<br>";
            }
        }else{
            echo " - ".$elem ."<br>";
        }
    }

    echo "<h2>Contenido de miArray2:</h2>";
    foreach ($miArray2 as $elem){
        if (is_array($elem)){
            foreach($elem as $otroArray){
                echo " - ".$otroArray."<br>";
            }
        }else{
            echo " - ".$elem ."<br>";
        }
    }

    echo "<h2>Contenido de miArray3:</h2>";
    foreach ($miArray3 as $elem){
        if (is_array($elem)){
            foreach($elem as $otroArray){
                echo " - ".$otroArray."<br>";
            }
        }else{
            echo " - ".$elem ."<br>";
        }
    }
    
    ?>
   
<?php
}
