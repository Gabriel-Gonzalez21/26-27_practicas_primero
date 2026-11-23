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
    new Punto(400, 250, "blue", 3)
];


/*
El fichero de imagen se personalizará para que el nombre refleje información del cliente. Esto es, se tendrá un archivo dentro de
/imagenes/puntos/ con el nombre en el formato: imagen_dirip_navegador.jpg (dirip es la
dirección IP del cliente y navegador es una cadena que indica tipo de navegador, ej 192_168_2_101_chrome.png)
 */

$rutaImagenes = RUTABASE . "/imagenes/puntos";
$ip = str_replace(".", "_", $_SERVER["REMOTE_ADDR"]);
$navegador = "firefox";

//Nombre de la imagen
$nombreImagen = $rutaImagenes . "/imagen_" . $ip . "_" . $navegador . ".jpg";

//Nombre del fichero con los puntos
$nombreFichero = RUTABASE ."/ficheros/" ."puntos_" . $ip . "_" . $navegador . ".dat";



//Si no existe el fichero
if (!file_exists($nombreFichero)) {

    $fic = fopen($nombreFichero, "w");

    foreach ($arrayPuntos as $punto) {

        $linea = $punto->getX() . ";" .$punto->getY() . ";" .$punto->getColor() . ";" .$punto->getGrosor();

        fputs($fic, $linea . PHP_EOL);
    }

    fclose($fic);
}



//-------------------------------------------------
// APARTADO 3
/*
Este fichero contiene una línea por cada punto disponible. El formato de la línea será “x ; y ; color ; grosor “.
Lo primero que se hará cuando se accede a una página, será cargar los puntos de este fichero al
array Puntos. Así lo tendremos disponible en todos los ficheros php (index.php, imagen.php, etc)
*/
//-------------------------------------------------

$arrayPuntos = [];

$fic = fopen($nombreFichero, "r");

if ($fic) {

    while ($linea = fgets($fic)) {

        $linea = trim($linea);

        if ($linea == "") {
            continue;
        }

        $datos = explode(";", $linea);

        $arrayPuntos[] = new Punto((int)$datos[0], (int)$datos[1], $datos[2], (int)$datos[3]);
    }

    fclose($fic);
}


//Si no existe la imagen
if (!file_exists($nombreImagen)) {

    $imagen = imagecreatetruecolor(500,500);
    $blanco = imagecolorallocate($imagen, 255, 255, 255);
    $negro = imagecolorallocate($imagen,0,0,0);
    imagefill($imagen,0,0,$blanco);
    imagerectangle($imagen,0,0,499,499,$negro);

    foreach ($arrayPuntos as $punto) {

        $rgb = Punto::COLORES[$punto->getColor()]["rgb"];
        $colorGD = imagecolorallocate($imagen, $rgb[0], $rgb[1], $rgb[2]);
        imagefilledellipse($imagen, $punto->getX(), $punto->getY(), $punto->getGrosor() * 5, $punto->getGrosor() * 5, $colorGD);
    }

    imagejpeg($imagen, $nombreImagen);
}





//-----------------------------Recoger formulario al pulsar en guardar--------------------------------------
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

        //actualizo el fichero
        $fic = fopen($nombreFichero, "w");
        foreach ($arrayPuntos as $punto) {
            $linea = $punto->getX() . ";" .$punto->getY() . ";" .$punto->getColor() . ";" .$punto->getGrosor();
            fputs($fic, $linea . PHP_EOL);
        }
        fclose($fic);


        if (file_exists($nombreImagen)) {
            unlink($nombreImagen);
        }

        header("Location: ".$_SERVER["PHP_SELF"]);

        exit;
    }
    
}



//-------------------------Al pulsar el boton borrar punto------------------------------------------------
if (isset($_POST["borrar"]) && $_POST["puntoAborrar"] !== ""){

    $indice = (int)$_POST["puntoAborrar"];

    //Borrar punto del array
    //unset($arrayPuntos[$indice]);
    array_splice($arrayPuntos, $indice, 1);

    //Rescribir el fichero
    $fic = fopen($nombreFichero, "w");
    foreach ($arrayPuntos as $punto) {
        $linea = $punto->getX() . ";" .$punto->getY() . ";" .$punto->getColor() . ";" .$punto->getGrosor();
        fputs($fic,$linea . PHP_EOL);
    }
    fclose($fic);

    //Regenerar imagen
    if (file_exists($nombreImagen)) {
        unlink($nombreImagen);
    }

    //Recargar
    header("Location: ".$_SERVER["PHP_SELF"]);

    exit;

}


//------------------------------------Subida de fichero---------------------------------------

if (isset($_POST["subir"]) && isset($_FILES["ficheroPuntos"])) {

    //Abrir el txt subido
    $rutaTemporal = $_FILES["ficheroPuntos"]["tmp_name"];
    $fic = fopen($rutaTemporal,"r");

    //Leer las lineas
    while ($linea = fgets($fic)) {

        $linea = trim($linea);

        if ($linea == "") {
            continue;
        }

        $datos = explode(";", $linea);

        if (count($datos) != 4) {
            continue;
        }

        $x = (int)$datos[0];
        $y = (int)$datos[1];
        $color = $datos[2];
        $grosor = (int)$datos[3];

        //validaciones
        if (validaEntero($x, 0, 500, 0) && validaEntero($y, 0, 500, 0) && array_key_exists($color, Punto::COLORES)
            && array_key_exists($grosor,Punto::GROSORES)) {

            //añadir punto
            $arrayPuntos[] = new Punto($x, $y, $color, $grosor);
        }

    }

    //Reescribir el fichero
    fclose($fic);

    $fic = fopen($nombreFichero, "w");

    foreach ($arrayPuntos as $punto) {
        $linea = $punto->getX() . ";" . $punto->getY() . ";" . $punto->getColor() . ";" .$punto->getGrosor();
        fputs($fic,$linea . PHP_EOL);
    }

    fclose($fic);

    //Regenerar imagen
    if (file_exists($nombreImagen)) {
        unlink($nombreImagen);
    }

    //Recargar
    header("Location: " . $_SERVER["PHP_SELF"]);

    exit;


}














//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $barraUbi);
cuerpo($errores, $x, $y, $color, $grosor, $arrayPuntos,  $nombreImagen); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {
       
}
//vista
function cuerpo($errores, $x, $y, $color, $grosor, $arrayPuntos, $nombreImagen)
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


        <!--Puntos generados en text area-->
        <h3>Puntos generados</h3>
        <textarea rows="10" cols="50">
        <?php
        foreach ($arrayPuntos as $punto){
            
            echo $punto->getX(). ";". $punto->getY(). ";". $punto->getColor(). ";". $punto->getGrosor(). PHP_EOL;
        }
        ?>
        </textarea>



        <!--Imagen-->
        <h3>Imagen</h3>
        <img src="/imagenes/puntos/<?= basename($nombreImagen) ?>" alt="Puntos" >



        <!--Borrar punto-->
        <h3>Borrar un punto</h3>
        <select name="puntoAborrar" id="">
            <option value="">Seleccione un punto</option>
        <?php    
            foreach ($arrayPuntos as $clave => $valor){
        ?>
                <option value="<?= $clave ?>">
                    <?= $valor->getX() ?>;
                    <?= $valor->getY() ?>;
                    <?= $valor->getColor() ?>;
                    <?= $valor->getGrosor() ?>;
                </option>
        <?php 
            }
        ?>
        </select>
        <button type="submit" name="borrar">Borrar punto</button>


        <!--Descargar imagen-->
        <a href="imagen.php?descargar">Descargar imagen</a>


    </form>



    <!--formulario subir fichero puntos-->
    <h3>Subir fichero de puntos</h3>

    <form method="post" enctype="multipart/form-data">

        <input type="file" name="ficheroPuntos" accept=".txt">
        <button type="submit" name="subir">Subir fichero</button>

    </form>

<?php
}
