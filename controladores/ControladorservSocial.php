<?php

require_once('./modelo/servSocial.php');

class ControladorservSocial
{

  private $modelo;

  public function __CONSTRUCT()
  {
    $this->modelo = new servSocial();
  }

  public function Index()
  {
    require_once './vista/headerHTML.php';
    require_once './vista/servSocial/shwservSocial.php';
  }

  public function Crud()
  {
    $entidadservSocial = new servSocial();
    if (isset($_REQUEST['id'])) {
      $entidadservSocial = $this->modelo->Obtener($_REQUEST['id']);
    }

    require_once './vista/headerHTML.php';
    require_once './vista/servSocial/updservSocial.php';
  }

  public function Guardar()
  {

    $entidadservSocial = new servSocial();

    $entidadservSocial->id                = $_REQUEST['txtId'];
    $entidadservSocial->alumnoId          = $_REQUEST['txtaluId'];
    $entidadservSocial->dependenciaId     = $_REQUEST['txtdepId'];
    $entidadservSocial->programaId        = $_REQUEST['txtproId'];
    $entidadservSocial->coordinadorId     = $_REQUEST['txtcoorId'];
    $entidadservSocial->fInicio           = $_REQUEST['txtfIni'];
    $entidadservSocial->fTermina          = $_REQUEST['txtfTer'];
    $entidadservSocial->estatusId         = $_REQUEST['txtestId'];
    $entidadservSocial->fEstatus          = $_REQUEST['txtfEst'];

    if ($entidadservSocial->id > 0) {
      $this->modelo->Actualizar($entidadservSocial);
      header('Location: ./controlador.php?gui=servSocial');
    } else {
      $this->modelo->Registrar($entidadservSocial);
      if ($_SESSION['errMsg'] == 0) {
        $this->Crud();
      } else {
        require_once './vista/headerHTML.php';
        require_once './vista/servSocial/updservSocial.php';
      }
    }
  }

  public function Eliminar()
  {
    $this->modelo->Eliminar($_REQUEST['id']);
    header('Location: ./controlador.php?gui=servSocial');
  }
}
