<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(__DIR__ . "/../../scripts/clases/InstrumentoBase.php");
include_once(__DIR__ . "/../../scripts/clases/Flauta.php");
include_once(__DIR__ . "/../../scripts/clases/Persona.php");



//controlador

/*
En el controlador de index.php, se definirán variables para el
acceso a las clases y se mostrará el funcionamiento de las distintas clases en la vista.
*/

/*
$miIntrumento = new InstrumentoBase("Flauta");
*/

$flauta = Flauta::CrearDesdeArray([]);

$persona = Persona::registrarPersona(
    "Juan",
    "05/01/2000",
    "Calle Principal 1",
    "Antequera",
    EstadoCivil::Casado
);



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
cuerpo($flauta, $persona); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {
       
}
//vista
function cuerpo($flauta, $persona)
{
?>
    <br><br>

   <h2>RELACIÓN 4: Clases, objetos y enumeraciones</h2>

   
   <?php 

    /*
    echo "Primer instrumento: " . $miIntrumento->getDescripcion(). "<br>"; 
    echo " y su edad es: ". $miIntrumento->getEdad(). "<br>"; 
    echo " Uso de la funcion envejecer(), la edad pasa a ser: ";
    $miIntrumento->envejecer();
    echo $miIntrumento->getEdad();
    echo "<br>";
    echo "<h3>Uso del toString</h3>";
    echo $miIntrumento;
    */
    
    echo "<h2>Intrumento</h2>";
    echo $flauta;

    echo "<h2>Persona</h2>";
    echo $persona;


   ?>
   

<?php
}
