<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(__DIR__ . "/../../scripts/librerias/val_normal.php");
//controlador

$valor = 50;

$cadena = "Destornillador";

$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 5",
        "LINK" =>""
    ]
];



//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $barraUbi);
cuerpo($valor, $cadena); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {
       
}
//vista
function cuerpo($valor, $cadena)
{
?>
    <br><br>

   <h2>RELACIÓN 5: Introducción de información</h2>

   <?php 

    
    echo "<h3>Test validaEntero de val_normal</h3>";
    if(VALNORMAL\validaEntero($valor,0,100,5)){
        echo "Correcto";
    }
    else{
        echo "Incorrecto";
    }

    echo "<br>";
    echo $valor;



    echo "<h3>Test validacadena de val_normal</h3>";
    if(VALNORMAL\validaCadena($cadena,10, "cadena por defecto")){
        echo "cadena menor que la longitud ";
    }
    else{
        echo "cadena mayor que la longitud";
    }

    echo "<br>";
    echo $cadena;
    ?>

<?php
}
