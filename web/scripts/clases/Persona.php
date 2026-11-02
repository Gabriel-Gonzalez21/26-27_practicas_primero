<?php

class Persona{

    private string $_nombre;
    private string $_fecha_nacimiento;
    private string $_domicilio;
    private string $_localidad;
    private EstadoCivil $_estado;


    private function __construct()
    {
        $this->_nombre = "prueba";
        $this->_fecha_nacimiento = "01/01/2000";
        $this->_domicilio = "carrera 12";
        $this->_localidad = "antequera";
        $this->_estado = EstadoCivil::Soltero;
    }


    public static function registrarPersona(string $nombre, string $fechaNacimiento, 
                                            string $domicilio, string $localidad, EstadoCivil $estado): Persona
    {
        $persona = new Persona();

        $persona->_nombre = $nombre;
        $persona->_fecha_nacimiento = $fechaNacimiento;
        $persona->_domicilio = $domicilio;
        $persona->_localidad = $localidad;
        $persona->_estado = $estado;

        return $persona;
    }
    
    
    //metodos getter 
    public function getNombre(): string{
        return $this->_nombre;
    }
    public function getFechaNacimiento(): string{
        return $this->_fecha_nacimiento;
    }
    public function getDomicilio(): string{
        return $this->_domicilio;
    }
    public function getLocalidad(): string{
        return $this->_localidad;
    }
    public function getEstado(): EstadoCivil{
        return $this->_estado;
    }


    //metodo setter
    public function setNombre(string $nombre): void{
            $this->_nombre = $nombre;
    }
    public function setFechaNacimiento(string $fechaNacimiento): void{
            $this->_fecha_nacimiento = $fechaNacimiento;
    }
    public function setDomicilio(string $domicilio): void{
            $this->_domicilio = $domicilio;
    }
    public function setLocalidad(string $localidad): void{
            $this->_localidad = $localidad;
    }
    public function setEstado(EstadoCivil $estado): void{
            $this->_estado = $estado;
    }


    public function __toString(): string
    {
        return $this->_nombre ." es una persona " .$this->_estado->descripcion() ." nacida en " .$this->_fecha_nacimiento .
                    " y que vive en " .$this->_localidad;
    }


}
