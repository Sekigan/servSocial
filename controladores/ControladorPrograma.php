<?php

require_once('./modelo/Programa.php');

class ControladorPrograma
{

  private $modelo;

  public function __CONSTRUCT()
  {
    $this->modelo = new Programa();
  }

  public function Index()
  {
    require_once './vista/headerHTML.php';
    require_once './vista/programa/shwPrograma.php';
  }

  public function Crud()
  {
    $entidadprograma = new Programa();
    if (isset($_REQUEST['id'])) {
      $entidadprograma = $this->modelo->Obtener($_REQUEST['id']);
    }

    require_once './vista/headerHTML.php';
    require_once './vista/programa/updPrograma.php';
  }

  public function Guardar()
  {

    $entidadprograma = new Programa();
    $entidadprograma->id               = $_REQUEST['txtId'];
    $entidadprograma->nombre           = $_REQUEST['txtnombre'];
    $entidadprograma->objetivo         = $_REQUEST['txtObjetivo'];
    $entidadprograma->actividades      = $_REQUEST['txtActividad'];
    $entidadprograma->dependenciaid    = $_REQUEST['selDEP'];
    $entidadprograma->tpoprogramaid    = $_REQUEST['selTIPO'];

    if ($entidadprograma->id > 0) {
      $this->modelo->Actualizar($entidadprograma);
      header('Location: ./controlador.php?gui=programa');
    } else {
      $this->modelo->Registrar($entidadprograma);
      if ($_SESSION['errMsg'] == 0) {
        $this->Crud();
      } else {
        require_once './vista/headerHTML.php';
        require_once './vista/programa/updPrograma.php';
      }
    }
  }

  public function Eliminar()
  {
    $this->modelo->Eliminar($_REQUEST['id']);
    header('Location: ./controlador.php?gui=programa');
  }
}
