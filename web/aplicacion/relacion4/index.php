<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(__DIR__ . "/../../scripts/clases/InstrumentoBase.php");
include_once(__DIR__ . "/../../scripts/clases/Flauta.php");
include_once(__DIR__ . "/../../scripts/clases/Persona.php");
include_once(__DIR__ . "/../../scripts/clases/SerieFibonacci.php");
include_once(__DIR__ . "/../../scripts/clases/ClaseMisPropiedades.php");



//controlador

/*
En el controlador de index.php, se definirán variables para el
acceso a las clases y se mostrará el funcionamiento de las distintas clases en la vista.
*/

/*
$miIntrumento = new InstrumentoBase("Flauta");
*/

$flauta = Flauta::CrearDesdeArray([]);

/*----------------------*/

$arrayEstados = EstadoCivil::casos(); //Array con todos los casos

$estadoAleatorio = $arrayEstados[mt_rand(0, count($arrayEstados)-1)];

$persona = Persona::registrarPersona(
    "Juan",
    "05/01/2000",
    "Calle Principal 1",
    "Antequera",
    $estadoAleatorio
);

/*----------------------*/

$objeto = new ClaseMisPropiedades();

$objeto->propPublica = "publica";

$objeto->propiedad1 = 25;
$objeto->propiedad2 = "cadena de texto";






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
cuerpo($flauta, $persona, $objeto); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {
       
}
//vista
function cuerpo($flauta, $persona, $objeto)
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
    
    echo "<h2>Instrumento</h2>";
    echo $flauta;

    echo "<h2>Persona</h2>";
    echo $persona;

    echo "<h2>Fibonacci con iterator</h2>";
    foreach(new SerieFibonacci(10) as $valor)
    {
        echo $valor .", ";
    }

    echo "<h2>Fibonacci con generador</h2>";
    foreach(new SerieFibonacci(10) as $valor)
    {
        echo $valor . ", ";
    }


    echo "<h2>ClaseMisPropiedades</h2>";
    echo "La propiedad1 vale ". $objeto->propiedad1. "<br>";

    foreach($objeto as $clave => $valor){
        echo $clave . " => " . $valor . "<br>";
    }


   ?>
   

<?php
}
