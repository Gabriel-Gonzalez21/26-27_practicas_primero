<?php

/**
 * Clase Abstracta InstrumentoBase
 * Sirve como plantilla base para la creación de diferentes tipos de instrumentos musicales.
 */
abstract Class InstrumentoBase{

    private string $_descripcion;
    protected int $_edad = 10;
    protected static int $_numElementosCreados = 0;
    public int $ordenCreacion = 0;


    /**
     * Constructor de la clase InstrumentoBase para inicializar
     *  las propiedades
     */
    public function __construct(string $descripcion, int $edad = 10)
    {
        $this->_descripcion = $descripcion;
        $this->_edad = $edad;
        self::$_numElementosCreados++; //Contador de elementos creados
        $this->ordenCreacion = self::$_numElementosCreados; //Se le asigan el numero de creacion a esta variable

    }


    //metodos getter 
    public function getDescripcion(): string{
        return $this->_descripcion;
    }
    public function getEdad(): int{
        return $this->_edad;
    }


    //metodo setter
    public function setDescripcion(string $descripcion): void{
        if (!empty($descripcion)) {
            $this->_descripcion = $descripcion;
        }
    }

    /**
     * metodo abstracto sonido
     *
     * @return string
     */
    abstract public function sonido() : string ;


    /**
     * metodo abstracto afinar
     *
     * @return string
     */
    abstract public function afinar() : string ;


    /**
     * Metodo que aumenta la edad del instrumento en un año
     *
     * @return void
     */
    public function envejecer(): void{
        $this->_edad ++;
    }


    /**
     * Metodo toString que devuelve una cadena con la siguiente información
     *
     * @return string
     */
    public function __toString(): string
    {
        return "Intrumento con descripción ". $this->_descripcion. ", instancia ". $this->ordenCreacion. ",<br>".
                " de un total de ". self::$_numElementosCreados . ". Tiene ". $this->getEdad(). " años. <br>".
                " La clase es ". get_class($this);
    }

}