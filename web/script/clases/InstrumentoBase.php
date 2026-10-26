<?php

Class InstrumentoBase{

    public string $_descripcion;


    //Constructor
    public function __construct(string $descripcion)
    {
        $this->_descripcion = $descripcion;
    }


    //metodo getter 
    public function getDescripcion(){
        return $this->_descripcion;
    }

    //metodo setter
    public function setDescripcion($descripcion){
        if (!empty($descripcion)) {
            $this->_descripcion = $descripcion;
        }
        
    }



}