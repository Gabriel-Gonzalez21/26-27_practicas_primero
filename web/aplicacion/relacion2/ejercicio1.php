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
        "LINK" =>"/aplicacion/relacion2/index.php"
    ],
    [
        "TEXTO"=>"Ejercicio 1",
        "LINK" =>""
    ]
];




//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $barraUbi);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {
       
}
//vista
function cuerpo()
{
?>

<?php


}
