<?php 


/**
 * función que se le pasa un parámetro con valor por defecto 10 y se
* encarga de devolver una cadena de longitud la indicada cuyos caracteres son generados de forma
* aleatoria (caracteres válidos: letras mayúsculas, minúsculas y números). Devolverá false si se ha
* indicado un número negativo o igual a 0.
 *
 * @param array $array
 * @param string $cadena
 * @param integer $num1
 * @param integer $num2
 * @return boolean
 */
function cuentaVeces(array &$array, string $cadena, int $num1, int &$num2): bool{
    
    $num2++;
    if ($cadena != "2daw" && $cadena != "primera"){
        $array[$cadena] = $num1;
        return true;
    }else{
        return false;
    }
}



/**
 * función que se le pasa un parámetro con valor por defecto 10 y se
 * encarga de devolver una cadena de longitud la indicada cuyos caracteres son generados de forma
 * aleatoria (caracteres válidos: letras mayúsculas, minúsculas y números). Devolverá false si se ha
 * indicado un número negativo o igual a 0.
 * 
 *
 * @param integer $valor
 * @return string
 */
function generarCadena(int $valor = 10): string|false{

    if ($valor <= 0){
        return false;
    }else{
        $caracteres = "qwertyuiopasdfghjklñzxcvbnmQWERTYUIOPASDFGHJKLÑZXCVBNM1234567890";

        $array = [];

        for ($x = 0; $x < $valor; $x++){
            $array[$x] = $caracteres[rand(0 ,strlen($caracteres))];
        }

        // Convertir el array en una cadena
        $cadena = implode("", $array);
        return $cadena;
    }

    
}