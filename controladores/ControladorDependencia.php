<?php

require_once('./modelo/Dependencia.php');

class ControladorDependencia
{

    private $modelo;

    public function __CONSTRUCT()
    {
        $this->modelo = new dependencia();
    }

    public function Index()
    {
        require_once './vista/headerHTML.php';
        require_once './vista/dependencias/shwDependencias.php';
    }

    public function Crud()
    {
        $entidaddependencia = new dependencia();
        if (isset($_REQUEST['id'])) {
            $entidaddependencia = $this->modelo->Obtener($_REQUEST['id']);
        }

        require_once './vista/headerHTML.php';
        require_once './vista/dependencias/updDependencias.php';
    }

    public function Guardar()
    {

        $entidaddependencia = new dependencia();

        $entidaddependencia->id             = $_REQUEST['txtId'];
        $entidaddependencia->clave          = $_REQUEST['txtClave'];
        $entidaddependencia->nombre         = $_REQUEST['txtNombre'];
        $entidaddependencia->calle          = $_REQUEST['txtCalle'];
        $entidaddependencia->noExt          = $_REQUEST['txtNoExt'];
        $entidaddependencia->colonia        = $_REQUEST['txtColonia'];
        $entidaddependencia->telefono       = $_REQUEST['txtTelefono'];
        $entidaddependencia->contacto       = $_REQUEST['txtContacto'];
        $entidaddependencia->telContacto    = $_REQUEST['txtTelContacto'];
        $entidaddependencia->email          = $_REQUEST['txtEmail'];
        

        if ($entidaddependencia->id > 0) {
            $this->modelo->Actualizar($entidaddependencia);
            header('Location: ./controlador.php?gui=dependencia');
        } else {
            $this->modelo->Registrar($entidaddependencia);
            if ($_SESSION['errMsg'] == 0) {
                $this->Crud();
            } else {
                require_once './vista/headerHTML.php';
                require_once './vista/dependencias/updDependencias.php';
            }
        }
    }

    public function Eliminar()
    {
        $this->modelo->Eliminar($_REQUEST['id']);
        header('Location: ./controlador.php?gui=dependencia');
    }
}
