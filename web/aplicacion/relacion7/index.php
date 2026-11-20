<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(__DIR__ . "/../../scripts/librerias/validacion.php");
//controlador


$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 7",
        "LINK" =>""
    ]
];


$x = 0;
$y = 0;
$color = "";
$grosor = "";

$errores = [];

$arrayPuntos = [
    new Punto(100, 100, "red", 1),

    new Punto(200, 150, "green", 2),

    new Punto( 300, 250, "blue", 3)
];

//Recoger formulario al pulsar en guardar
if (isset($_POST["guardar"])) {
    if (isset($_POST["x"])) {
        $x = $_POST["x"];
    }
    if (isset($_POST["y"])) {
        $y = $_POST["y"];
    }
    if (isset($_POST["color"])) {
        $color = trim($_POST["color"]);
    }
    if (isset($_POST["grosor"])) {
        $grosor = $_POST["grosor"];
    }
    
    
    //validaciones
    if (!validaEntero($x, 0, 500, 0)) {
        $errores["x"] = "X debe estar entre 0 y 500";
    }

    if (!validaEntero($y, 0, 500, 0)) {
        $errores["y"] = "Y debe estar entre 0 y 500";
    }

    if (!array_key_exists($color, Punto::COLORES)) {
        $errores["color"] = "Seleccione un color";
    }

    if (!array_key_exists($grosor, Punto::GROSORES)) {
        $errores["grosor"] = "Seleccione un grosor";
    }


    //Crear un nuevo punto si todo es correcto
    if (count($errores) === 0){
        //se crea una instancia Punto y se guarda en el arrayPuntos
        $arrayPuntos[] = new Punto($x, $y, $color, $grosor);
    }
    
}





//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $barraUbi);
cuerpo($errores, $x, $y, $color, $grosor, $arrayPuntos); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {
       
}
//vista
function cuerpo($errores, $x, $y, $color, $grosor, $arrayPuntos)
{
?>
    <br><br>

   <h2>RELACIÓN 7: ficheros</h2>

    <form action="" method="post">
        <label>X:</label>
        <input type="number" name="x" value="<?= $x ?>">
        <?php
            //Si existe errores en x
            if (isset($errores["x"])) {
                echo $errores["x"];
            }
        ?>
        <br>

        <label>Y:</label>
        <input type="number" name="y" value="<?= $y ?>">
        <?php
            //Si existe errores en y
            if (isset($errores["y"])) {
                echo $errores["y"];
            }
        ?>
        <br>

        <!--Select de color-->
        <label>Color:</label>
        <select name="color" id="color">
            <option value="">Seleccione color</option>

            <?php
            foreach (Punto::COLORES as $clave => $datosColor) {
            ?>

            <option value="<?= $clave ?>">
                <?= $datosColor["nombre"] ?>
            </option>

            <?php
            }
            ?>
        </select>

        <?php
        //Si hay errores en color
        if (isset($errores["color"])) {
            echo $errores["color"];
        }
        ?>
        <br>

        <!--Select de grosor-->
        <label>Grosor:</label>
        <select name="grosor" id="grosor">
            <option value="">Seleccione grosor</option>

            <?php
            foreach (Punto::GROSORES as $clave => $valor) {
            ?>

            <option value="<?= $clave ?>">
                <?= $valor ?>
            </option>

            <?php
            }
            ?>
        </select>

        <?php
        //Si hay errores en grosor
        if (isset($errores["grosor"])) {
            echo $errores["grosor"];
        }
        ?>
        <br>
        

        <button type="submit" name="guardar">Guardar</button>

        <h3>Puntos generados</h3>

        <textarea rows="10" cols="50">
        <?php
        foreach ($arrayPuntos as $punto){
            
            echo $punto->getX(). ";". $punto->getY(). ";". $punto->getColor(). ";". $punto->getGrosor(). PHP_EOL;
        }
        ?>
        </textarea>


        <h3>Imagen</h3>
        <img src="imagen.php" alt="Puntos">

    </form>
<?php
}
