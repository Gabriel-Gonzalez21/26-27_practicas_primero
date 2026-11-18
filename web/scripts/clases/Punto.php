<?php

class Punto{

    //Las constantes no llevan tipo a diferencia de las propiedades
    //esto estaria mal: public const array COLORES

    //Constante pública de clase COLORES con los colores posibles
    public const COLORES = [

        "red"=>["nombre"=>"rojo", "rgb"=>[255,0,0]],

        "green"=>["nombre"=>"verde", "rgb"=>[0,255,0]],

        "blue"=>["nombre"=>"azul", "rgb"=>[0,0,255]],

        "black"=>["nombre"=>"negro", "rgb"=>[0,0,0]]
    ];


    //Constante pública de clase GROSORES con los grosores posibles
    public const GROSORES = [
        1 => "fino", 
        2 => "medio", 
        3 => "grueso"
    ];


    private int $_x;

    private int $_y;

    private string $_color;

    private string $_grosor;



    //-------------------GETTERS Y SETTERS--------------------------------

    //x
    public function getX(): int{
        return $this->_x;
    }

    public function setX(int $x): bool{

        if (validaEntero($x, 0, 20000, 0) === false){
            return false;
        }

        $this->_x = $x;
        return true;
    }

    //y
    public function getY(): int{
        return $this->_y;
    }

    public function setY(int $y): bool{

        if (validaEntero($y, 0, 20000, 0) === false){
            return false;
        }

        $this->_y = $y;
        return true;
    }


}