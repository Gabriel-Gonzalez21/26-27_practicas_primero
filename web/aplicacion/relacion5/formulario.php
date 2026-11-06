<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador



$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 5",
        "LINK" =>"/aplicacion/relacion5/index.php"
    ],
    [
        "TEXTO"=>"Formulario",
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

   <h2>RELACIÓN 5: Introducción de información</h2>

   <form action="">
        <label for="">Nombre: </label>
        <input type="text"><br>
        <label for="">Contraseña: </label>
        <input type="password"><br>
        <label for="">Repetir contraseña: </label>
        <input type="password"><br>
   </form>


<?php
}
