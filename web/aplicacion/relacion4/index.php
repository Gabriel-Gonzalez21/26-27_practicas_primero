<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

/*
En el controlador de index.php, se definirán variables para el
acceso a las clases y se mostrará el funcionamiento de las distintas clases en la vista.
*/


















$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 4",
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
    <br><br>

   <h2>RELACIÓN 4: Clases, objetos y enumeraciones</h2>

<?php
}
