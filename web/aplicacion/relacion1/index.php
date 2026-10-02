<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION");
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

   <h2>RELACIÓN 1: Arrays y fechas</h2>
   <a href="ejercicio1.php">Ejercicio 1</a>
<?php
}
