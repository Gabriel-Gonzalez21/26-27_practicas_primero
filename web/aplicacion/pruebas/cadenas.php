<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
define("NUME",25);
const NUME1=56;
        
        
//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("ARRAY");
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}
//vista
function cuerpo()
{
    ?>

    El ni&ntilde; o me ha escrito niño
    
    

<?php

}

