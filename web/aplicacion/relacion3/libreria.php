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


/**
 * Esta función recibe al menos tres parámetros. El primero (entero) es el
 * tipo de operación. Los demás son valores numéricos (los operandos). El tipo de operación puede ser
 * 1, suma todos los operandos
 * 2, al primer operando se restan el resto
 * 3, multiplicación de todos los operandos.
 * En cualquier otro caso se suman los operandos que ocupan las posiciones pares y se restan
 * los de las posiciones impares (el primer operando es 1)
 *
 * @param integer $tipoOperacion
 * @param float ...$operador
 * @return float
 */
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
            //Primer operador
            $primerOperador = $operador[0];
            $resultado = $primerOperador;
            for ($x = 1; $x < count($operador); $x++){//El bucle empieza en uno para que no se reste a si mismo el primer operador
                $resultado *= $operador[$x];
            }
            break;
        default: 
            $pares = [];
            $impares = [];
            for ($x = 0; $x < count($operador); $x++){
                if ($x % 2 === 0){
                    array_push($pares, $operador[$x]);
                }else{
                    array_push($impares, $operador[$x]);
                }
            }
            
            $sumaPares = array_sum($pares);
            $sumaImpares = array_sum($impares);

            $resultado = $sumaPares - $sumaImpares;
            
    }

    return $resultado;

}


/**
 * Undocumented function
 *
 * @param integer $num1
 * @param integer $num2
 * @param integer $num
 */
function devuelve(int &$num1, int $num2 = 5, int $num3 = 10): float{
            
    $multiplicacion =  $num1 * $num2 * $num3;

    $suma = $num1 + $num2 + $num3;
    $num1 = $suma;

    return $multiplicacion;

}