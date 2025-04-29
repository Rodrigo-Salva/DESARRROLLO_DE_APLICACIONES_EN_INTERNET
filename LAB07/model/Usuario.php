<?php
class Usuario
{
    private $_nombre;
    private $_correo;
    private $_clave;

    public function __construct($nombre, $correo, $clave)
    {
        $this->_nombre = $nombre;
        $this->_correo = $correo;
        $this->_clave = $clave;
    }

    public function getNombre()
    {
        return $this->_nombre;
    }
    public function getCorreo()
    {
        return $this->_correo;
    }
    public function getClave()
    {
        return $this->_clave;
    }

    public function setNombre($nombre)
    {
        $this->_nombre = $nombre;
    }
    public function setCorreo($correo)
    {
        $this->_correo = $correo;
    }
    public function setClave($clave)
    {
        $this->_clave = $clave;
    }
}
