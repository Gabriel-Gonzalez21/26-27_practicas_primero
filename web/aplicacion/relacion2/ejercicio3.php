<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$caracteres = "asdfgghjkklññooyttyrerwqASDDFFEAQFAFFASFASSFA123456789";
$nuevaCadena = [];

//Rellenar el nuevo array
for ($x = 0; $x <= 20; $x++){
    
    $IndiceCaracterRandom = mt_rand(0, strlen($caracteres));
    $nuevaCadena[$x] = $caracteres[$IndiceCaracterRandom];
}



$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 2",
        "LINK" =>""
    ]
];



//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $barraUbi);
cuerpo($caracteres); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {
       
}
//vista
function cuerpo($caracteres)
{
?>
    <br><br>

   <h2>Ejercicio 3</h2>
   
<?php
}
