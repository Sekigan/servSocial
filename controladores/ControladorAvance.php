<?php

require_once('./modelo/Avance.php');

class ControladorAvance{

  private $modelo;

  public function __CONSTRUCT(){
      $this->modelo = new avance();
  }

  public function Index(){
      require_once './vista/headerHTML.php';
      require_once './vista/avance/shwAvance.php';
  }

  public function Crud(){
      $entidadavance = new Avance();
      if(isset($_REQUEST['id'])){
          $entidadavance = $this->modelo->Obtener($_REQUEST['id']);
      }

      require_once './vista/headerHTML.php';
      require_once './vista/avance/updAvance.php';

  }

  public function Guardar(){

    $entidadavance = new Avance();
    $entidadavance->id                  = $_REQUEST['txtId'];
    $entidadavance->alumnoId             = $_REQUEST['txtnombre'];
    $entidadavance->fEntrega            = $_REQUEST['txtObjetivo'];
    $entidadavance->descActividad       = $_REQUEST['txtActividad'];
    $entidadavance->totHrs            = $_REQUEST['selDep'];
    $entidadavance->noSemanas         = $_REQUEST['selTipo'];
    $entidadavance->fInicioPeriodo    = $_REQUEST['selTipo'];
    $entidadavance->fTerminaPeriodo    = $_REQUEST['selTipo'];

    if($entidadavance->id >0){
      $this->modelo->Actualizar($entidadavance);
      header('Location: ./controlador.php?gui=avance');
    }
    else {
      $this->modelo->Registrar($entidadavance);
      if($_SESSION['errMsg']==0)
      {
        $this->Crud();
      }
      else{
        require_once './vista/headerHTML.php';
        require_once './vista/avance/updAvance.php';
      }
    }


}

  public function Eliminar(){
      $this->modelo->Eliminar($_REQUEST['id']);
      header('Location: ./controlador.php?gui=avance');
  }

}
