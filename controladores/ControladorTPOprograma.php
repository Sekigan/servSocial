<?php

require_once('./modelo/TPOprograma.php');

class ControladorTPOprograma
{

  private $modelo;

  public function __CONSTRUCT()
  {
    $this->modelo = new TPOprograma();
  }

  public function Index()
  {
    require_once './vista/headerHTML.php';
    require_once './vista/TPOprograma/shwTpoPrograma.php';
  }

  public function Crud()
  {
    $entidadTPOprog = new TPOprograma();
    if (isset($_REQUEST['id'])) {
      $entidadTPOprog = $this->modelo->Obtener($_REQUEST['id']);
    }

    require_once './vista/headerHTML.php';
    require_once './vista/TPOprograma/updTpoPrograma.php';
  }

  public function Guardar()
  {

    $entidadTPOprog = new TPOprograma();

    $entidadTPOprog->id            = $_REQUEST['txtId'];
    $entidadTPOprog->nombre         = $_REQUEST['txtNombre'];
    $entidadTPOprog->idDependencia   = $_REQUEST['selDep'];
    
    if ($entidadTPOprog->id > 0) {
      $this->modelo->Actualizar($entidadTPOprog);
      header('Location: ./controlador.php?gui=TPOprograma');
    } else {

      $this->modelo->Registrar($entidadTPOprog);

      if ($_SESSION['errMsg'] == 0) {
        $this->Crud();
      } else {
        require_once './vista/headerHTML.php';
        require_once './vista/TPOprograma/updTpoPrograma.php';
      }
    }
  }

  public function Eliminar()
  {
    $this->modelo->Eliminar($_REQUEST['id']);
    header('Location: ./controlador.php?gui=TPOprograma');
  }
}
