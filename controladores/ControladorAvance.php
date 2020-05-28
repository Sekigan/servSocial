<?php

require_once('./modelo/Avance.php');

class ControladorAvance
{

  private $modelo;

  public function __CONSTRUCT()
  {
    $this->modelo = new Avance();
  }

  public function Index()
  {
    require_once './vista/headerHTML.php';
    require_once './vista/avance/shwAvance.php';
  }

  public function Crud()
  {
    $entidadavance = new Avance();
    if (isset($_REQUEST['id'])) {
      $entidadavance = $this->modelo->Obtener($_REQUEST['id']);
    }

    require_once './vista/headerHTML.php';
    require_once './vista/avance/updAvance.php';
  }

  public function Guardar()
  {

    $entidadavance = new Avance();
    $entidadavance->id                  = $_REQUEST['txtid'];
    $entidadavance->alumnoid             = $_REQUEST['selAL'];
    $entidadavance->fEntrega            = $_REQUEST['fEntrega'];
    $entidadavance->descActividad       = $_REQUEST['txtActividad'];
    $entidadavance->totHrs            = $_REQUEST['totHrs'];
    $entidadavance->noSemanas         = $_REQUEST['noSemanas'];
    $entidadavance->fInicioPeriodo    = $_REQUEST['fInicioPeriodo'];
    $entidadavance->fTerminaPeriodo    = $_REQUEST['fTerminaPeriodo'];

    if ($entidadavance->id > 0) {
      $this->modelo->Actualizar($entidadavance);
      header('Location: ./controlador.php?gui=avance');
    } else {
      $this->modelo->Registrar($entidadavance);
      if ($_SESSION['errMsg'] == 0) {
        $this->Crud();
      } else {
        require_once './vista/headerHTML.php';
        require_once './vista/avance/updAvance.php';
      }
    }
  }

  public function Eliminar()
  {
    $this->modelo->Eliminar($_REQUEST['id']);
    header('Location: ./controlador.php?gui=avance');
  }
}
