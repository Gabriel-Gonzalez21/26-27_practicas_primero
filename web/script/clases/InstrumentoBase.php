<?php

Class InstrumentoBase{

    public string $_descripcion;
    private int $_edad = 10;


    //Constructor
    public function __construct(string $descripcion, int $edad = 10)
    {
        $this->_descripcion = $descripcion;
        $this->_edad = $edad;
    }


    //metodos getter 
    public function getDescripcion(){
        return $this->_descripcion;
    }

    public function getEdad(){
        return $this->_edad;
    }


    //metodo setter
    public function setDescripcion($descripcion){
        if (!empty($descripcion)) {
            $this->_descripcion = $descripcion;
        }
    }

    //metodo abstracto sonido
    //abstract public function sonido() : string ;



}