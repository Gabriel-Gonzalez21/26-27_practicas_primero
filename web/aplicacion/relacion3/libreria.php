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
            $array[$x] = $caracteres[rand(0 ,strlen($caracteres) -1)];
        }


        // Convertir el array en una cadena
        //$cadena = implode("", $array);

        $cadena = "";
        foreach ($array as $elem){
            $cadena .= $elem;
        }

        return $cadena;
    }

    
}


function operaciones(int $tipoOperacion, float ...$operador): float{

    $resultado = 0;

    switch ($tipoOperacion){
        case 1: 
            foreach ($operador as $elem){ //Suma todos los elmentos de ...$operador
                $resultado += $elem;
            }
            break;
        case 2:
            //Primer operador
            $primerOperador = $operador[0];
            $resultado = $primerOperador;
            //resta a al primer operador el resto de operadores
            for ($x = 1; $x < count($operador); $x++){//El bucle empieza en uno para que no se reste a si mismo el primer operador
                $resultado -= $operador[$x];
            }
            break;
        
        case 3: 
            foreach ($operador as $elem){ //multiplicacion todos los elmentos de ...$operador
                $resultado *= $elem;
            }
            break;

    }

    return $resultado;

}