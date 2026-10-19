<?php 

function cuentaVeces(array $array, string $cadena, int $num1, int $num2): bool{
    
    $num2++;
    if ($cadena != "2daw" && $cadena != "primera"){
        $array[$cadena] = $num1;
        return true;
    }else{
        return false;
    }
}