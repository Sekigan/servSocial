<?php

require_once('./modelo/Estados.php');

class ControladorEstado
{

    private $modelo;

    public function __CONSTRUCT()
    {
        $this->modelo = new estado();
    }

    public function Index()
    {
        require_once './vista/headerHTML.php';
        require_once './vista/estados/shwEstados.php';
    }

    public function Crud()
    {
        $entidadestado = new estado();
        if (isset($_REQUEST['id'])) {
            $entidadestado = $this->modelo->Obtener($_REQUEST['id']);
        }

        require_once './vista/headerHTML.php';
        require_once './vista/estados/updEstados.php';
    }

    public function Guardar()
    {

        $entidadestado = new estado();

        $entidadestado->id            = $_REQUEST['txtId'];
        $entidadestado->clave         = $_REQUEST['txtClave'];
        $entidadestado->nombre   = $_REQUEST['txtnombre'];

        if ($entidadestado->id > 0) {
            $this->modelo->Actualizar($entidadestado);
            header('Location: ./controlador.php?gui=estado');
        } else {
            $this->modelo->Registrar($entidadestado);
            if ($_SESSION['errMsg'] == 0) {
                $this->Crud();
            } else {
                require_once './vista/headerHTML.php';
                require_once './vista/estados/updEstados.php';
            }
        }
    }

    public function Eliminar()
    {
        $this->modelo->Eliminar($_REQUEST['id']);
        header('Location: ./controlador.php?gui=estado');
    }
}
