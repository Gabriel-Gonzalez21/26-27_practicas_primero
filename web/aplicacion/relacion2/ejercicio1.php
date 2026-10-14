<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$cadena1 = "Cadena con comillas dobles";
$cadena2 = 'Cadena con comillas simples';
$cadena = <<<EOT
Hola, $nombre.
Este es un ejemplo de una cadena heredoc en PHP.
Puedes usar comillas dobles "así" o simples 'así' sin escapar.
EOT;

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
