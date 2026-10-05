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
    1 => "illo",
    16 => "olla",
    54 => "fallo"
];

//Añadir el valor 34 al final
array_push($miArray , 34);

//Añadir los valores “cadena”, true, 1.345 en las posiciones “uno”, “dos” y “tres”
$miArray["uno"] = "cadena";
$miArray["dos"] = true;
$miArray["tres"] = 1.345;
$miArray["ultima"] = [1,34,"nueva"];




//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION",$barraUbi);
cuerpo($miArray); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {
       
}
//vista
function cuerpo($miArray)
{
?>
    <br><br>

   <h2>Ejercicio 3</h2>

    <?php

    //Mostrar el array
    echo "Contenido del array: <br>";
    foreach ($miArray as $elem){
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
