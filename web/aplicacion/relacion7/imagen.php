<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(__DIR__ . "/../../scripts/librerias/validacion.php");


$ip = str_replace(".", "_", $_SERVER["REMOTE_ADDR"]);
$navegador = "firefox";
$nombreFichero = RUTABASE . "/ficheros/puntos_" . $ip . "_" . $navegador . ".dat";


//Leer el fichero
$arrayPuntos = [];
$fic = fopen($nombreFichero, "r");

if ($fic) {
    while (($linea = fgets($fic)) !== false) {
        $linea = trim($linea);

        if ($linea === "") {
            continue;
        }

        $datos = explode(";", $linea);

        $arrayPuntos[] = new Punto((int) $datos[0], (int) $datos[1], $datos[2], (int) $datos[3]
        );
    }

    fclose($fic);
}


//Al pulsar el boton descargar
if (isset($_GET["descargar"])) {
    $imagen = imagecreatetruecolor(500, 500);
    $blanco = imagecolorallocate($imagen, 255, 255, 255);
    $negro = imagecolorallocate($imagen, 0, 0, 0);

    imagefill($imagen, 0, 0, $blanco);
    imagerectangle($imagen, 0, 0, 499, 499, $negro);

    foreach ($arrayPuntos as $punto) {
        $rgb = Punto::COLORES[$punto->getColor()]["rgb"];
        $colorGD = imagecolorallocate($imagen, $rgb[0], $rgb[1], $rgb[2]);
        $diametro = $punto->getGrosor() * 5;

        imagefilledellipse(
            $imagen,
            $punto->getX(),
            $punto->getY(),
            $diametro,
            $diametro,
            $colorGD
        );
    }

    header('Content-Disposition: attachment; filename="imagen.jpg"');
    header('Content-Type: image/jpeg');

    imagejpeg($imagen);
    imagedestroy($imagen);
    exit;
}
