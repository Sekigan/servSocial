<?php

require_once('./modelo/Carrera.php');

class Controladorcarrera
{

    private $modelo;

    public function __CONSTRUCT()
    {
        $this->modelo = new carrera();
    }

    public function Index()
    {
        require_once './vista/headerHTML.php';
        require_once './vista/carrera/shwCarrera.php';
    }

    public function Crud()
    {
        $entidadcarrera = new carrera();
        if (isset($_REQUEST['id'])) {
            $entidadcarrera = $this->modelo->Obtener($_REQUEST['id']);
        }

        require_once './vista/headerHTML.php';
        require_once './vista/carrera/updCarrera.php';
    }

    public function Guardar()
    {

        $entidadcarrera = new carrera();

        $entidadcarrera->id            = $_REQUEST['txtId'];
        $entidadcarrera->clave         = $_REQUEST['txtClave'];
        $entidadcarrera->nombre   = $_REQUEST['txtnombre'];

        if ($entidadcarrera->id > 0) {
            $this->modelo->Actualizar($entidadcarrera);
            header('Location: ./controlador.php?gui=carrera');
        } else {
            $this->modelo->Registrar($entidadcarrera);
            if ($_SESSION['errMsg'] == 0) {
                $this->Crud();
            } else {
                require_once './vista/headerHTML.php';
                require_once './vista/carrera/updCarrera.php';
            }
        }
    }

    public function Eliminar()
    {
        $this->modelo->Eliminar($_REQUEST['id']);
        header('Location: ./controlador.php?gui=carrera');
    }
}
