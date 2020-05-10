<?php

require_once('./modelo/Municipios.php');

class ControladorMunicipio
{

    private $modelo;

    public function __CONSTRUCT()
    {
        $this->modelo = new municipio();
    }

    public function Index()
    {
        require_once './vista/headerHTML.php';
        require_once './vista/municipios/shwMunicipios.php';
    }

    public function Crud()
    {
        $entidadmunicipio = new municipio();
        if (isset($_REQUEST['id'])) {
            $entidadmunicipio = $this->modelo->Obtener($_REQUEST['id']);
        }

        require_once './vista/headerHTML.php';
        require_once './vista/municipios/updMunicipios.php';
    }

    public function Guardar()
    {

        $entidadmunicipio = new municipio();

        $entidadmunicipio->id             = $_REQUEST['txtId'];
        $entidadmunicipio->clave          = $_REQUEST['txtClave'];
        $entidadmunicipio->nombre         = $_REQUEST['txtnombre'];
        $entidadmunicipio->cveEstado      = $_REQUEST['selTipo'];

        if ($entidadmunicipio->id > 0) {
            $this->modelo->Actualizar($entidadmunicipio);
            header('Location: ./controlador.php?gui=municipio');
        } else {
            $this->modelo->Registrar($entidadmunicipio);
            if ($_SESSION['errMsg'] == 0) {
                $this->Crud();
            } else {
                require_once './vista/headerHTML.php';
                require_once './vista/municipios/updMunicipios.php';
            }
        }
    }

    public function Eliminar()
    {
        $this->modelo->Eliminar($_REQUEST['id']);
        header('Location: ./controlador.php?gui=municipio');
    }
}
