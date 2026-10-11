<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

const FILAS = 6;

//matriz con la que se va a rellenar la secuencia
$secuencia = [];

//Cada fila se rellena con n, n numero de veces
for ($i = 1; $i <= FILAS; $i++){
    for ($x = 1; $x <= $i; $x++){
        $secuencia[$i][$x] = $i;
    }
}

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
        "TEXTO"=>"Ejercicio 4",
        "LINK" =>""
    ]
];


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $barraUbi);
cuerpo($secuencia); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {
       
}
//vista
function cuerpo($secuencia)
{
?>
    <br><br>

   <h2>Ejercicio 4</h2>
   <h3>Resultado:</h3>

   <?php

   foreach ($secuencia as $fila){
        foreach($fila as $valor){
            echo $valor . " ";
        }
        echo "<br>";
    }


   ?>
   
<?php
}
