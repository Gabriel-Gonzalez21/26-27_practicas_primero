<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(__DIR__ . "/../../script/clases/InstrumentoBase.php");

//controlador

/*
En el controlador de index.php, se definirán variables para el
acceso a las clases y se mostrará el funcionamiento de las distintas clases en la vista.
*/

$miIntrumento = new InstrumentoBase("Flauta");




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
cuerpo($miIntrumento); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {
       
}
//vista
function cuerpo($miIntrumento)
{
?>
    <br><br>

   <h2>RELACIÓN 4: Clases, objetos y enumeraciones</h2>

   
   <?php 


    echo "Primer instrumento: " . $miIntrumento->getDescripcion(). "<br>"; 
    echo " y su edad es: ". $miIntrumento->getEdad(). "<br>"; 
    echo " Uso de la funcion envejecer(), la edad pasa a ser: ";
    $miIntrumento->envejecer();
    echo $miIntrumento->getEdad();
    echo "<br>";
    echo "<h3>Uso del toString</h3>";
    echo $miIntrumento;

    



   ?>
   

<?php
}
