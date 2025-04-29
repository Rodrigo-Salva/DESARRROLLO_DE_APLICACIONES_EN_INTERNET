<?php
class Lista
{
    private $_usuarios;

    public function __construct()
    {
        $this->_usuarios = array();
    }

    public function getUsuarios()
    {
        return $this->_usuarios;
    }
    public function setUsuarios($usuarios)
    {
        $this->_usuarios = $usuarios;
    }

    public function nueva()
    {
        $user1 = new Usuario('Juan Pérez', 'juan@gmail.com', '1234');
        $user2 = new Usuario('María Sosa', 'maria@gmail.com', '9876');
        $this->_usuarios = array();
        $this->_usuarios[] = $user1;
        $this->_usuarios[] = $user2;
        return $this->_usuarios;
    }

    public function agregar($usuario)
    {
        $this->_usuarios[] = $usuario;
    }

    public function ingresar($correo, $clave)
    {
        $cantidad = count($this->_usuarios);
        for ($i = 0; $i < $cantidad; $i++) {
            $user = $this->_usuarios[$i];
            if ($user->getCorreo() == $correo && $user->getClave() == $clave) {
                return $user;
            }
        }
        return null;
    }
}
