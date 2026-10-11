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
function cabecera() {}
//vista
function cuerpo()
{
?>
    <br><br>

   Ahora estas en pruebas. <br>
   <a href="basicas.php">Funciones basicas</a> <br>
   <a href="pasopar.php">Paso de parametros</a> <br>
   <a href="array.php">Arrays</a>
<?php
}
