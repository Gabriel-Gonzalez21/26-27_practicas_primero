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

    <h2>Ejercicio 1</h2>

    <?php
        //Funciones matematicas
        echo "<h3>Funciones matemáticas</h3>";

        $numero = 67.67;
        echo "Voy a trabajar con el numero $numero <br>";

        echo "uso de round() = ". round($numero);
        echo "<br>";

        echo "uso de floor() = ". floor($numero);
        echo "<br>";

        echo "uso de pow() = ". pow($numero, 2);
        echo "<br>";

        echo "uso de sqrt() = ". sqrt($numero);
        echo "<br>";

        echo "uso de abs() en -67 = ". abs(-67);
        echo "<br>";

        echo "uso de max() entre 1, 67, 12 = ". max(1, 67, 12);
        echo "<br>";


        //Binario, Octal, Hexadecimal
        echo "<h3>Variables</h3>";

        $valorBinario = 010011;
        $valorOctal = 012;
        $valorHexadecimal = 0x1A;

        echo "Binario: $valorBinario <br>";
        echo "Octal: $valorOctal <br>";
        echo "Hexadecimal: $valorHexadecimal <br>";
        echo "<br>";
        echo "Binario en base 2: " . decbin($valorBinario);
        echo "<br>";
        
        echo "Octal en base 8: " . decoct($valorOctal);
        echo "<br>";
        
        echo "Hexadecimal en base 16: " . dechex($valorHexadecimal);
        echo "<br>";
        
        

    ?>

<?php
}
