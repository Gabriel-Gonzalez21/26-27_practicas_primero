<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//_____________________
//____ Controlador ____

//Cadena HEREDOC
$nombre="Juan";
$texto=<<<fin
Hola buenas tardes <br/>
¿Que tal estamos?. <br/>
Saludos: $nombre<br/>
fin;

//Cadena NOWDOC
$nombre2="Pedro";
$texto2=<<<'fin'
Este viernes quedamos<br/>
Espero que lo que me leas. <br/>
Firmado: $nombre2 <br/>
fin;




// Barra de ubicación

$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 2",
        "LINK" =>"/aplicacion/relacion2/index.php"
    ],
    [
        "TEXTO"=>"Ejercicio 1",
        "LINK" =>""
    ]
];

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 2");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION",$barraUbi);
cuerpo($nombre, $nombre2, $texto, $texto2, $barraUbi);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

//vista
function cuerpo($nombre, $nombre2, $texto, $texto2)
{
?>
    <h1>Ejercicio 1</h1>
    
<?php
    echo $nombre ."<br>";
    echo $texto."<br>";
    echo $texto2."<br>";

}