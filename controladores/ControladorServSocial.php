<?php

require_once('./modelo/ServSocial.php');

class ControladorservSocial
{

  private $modelo;

  public function __CONSTRUCT()
  {
    $this->modelo = new ServSocial();
  }

  public function Index()
  {
    require_once './vista/headerHTML.php';
    require_once './vista/servSocial/shwservSocial.php';
  }

  public function Crud()
  {
    $entidadservSocial = new ServSocial();
    if (isset($_REQUEST['id'])) {
      $entidadservSocial = $this->modelo->Obtener($_REQUEST['id']);
    }

    require_once './vista/headerHTML.php';
    require_once './vista/servSocial/updservSocial.php';
  }

  public function Guardar()
  {

    $entidadservSocial = new ServSocial();

    $entidadservSocial->id                = $_REQUEST['txtId'];
    $entidadservSocial->alumnoid          = $_REQUEST['selAL'];
    $entidadservSocial->dependenciaid     = $_REQUEST['selDEP'];
    $entidadservSocial->programaid        = $_REQUEST['selPRO'];
    $entidadservSocial->coordinadorid     = $_REQUEST['selCOOR'];
    $entidadservSocial->fInicio           = $_REQUEST['txtfIni'];
    $entidadservSocial->fTermina          = $_REQUEST['txtfTer'];
    $entidadservSocial->estatusid         = $_REQUEST['selESTA'];
    $entidadservSocial->fEstatus          = $_REQUEST['txtfEst'];
    echo var_dump($entidadservSocial);
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
