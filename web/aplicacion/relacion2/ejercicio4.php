<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$num1 = 17.5;
$num2 = 379987.24;

// Formatear número
$num1Formateado = number_format($num1, 1, ",", "");
$num2Formateado = number_format($num2, 2, ",", ".");

// Rellenar hasta 15 caracteres
$num1Formateado = str_pad($num1Formateado, 15, "0", STR_PAD_LEFT);
$num2Formateado = str_pad($num2Formateado, 15, " ", STR_PAD_LEFT);

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
        "TEXTO"=>"Ejercicio 4",
        "LINK" =>""
    ]
];



//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $barraUbi);
cuerpo($num1Formateado, $num2Formateado); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {
       
}
//vista
function cuerpo($num1Formateado, $num2Formateado)
{
?>
    <br><br>

   <h2>Ejercicio 4</h2>

   <?php
   

    echo "El primer valor -".$num1Formateado."-<br>";
    echo "El segundo valor -".$num2Formateado."-";
   
   
   ?>
   
<?php
}
