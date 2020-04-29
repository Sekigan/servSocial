<?php

require_once('./modelo/Estatus.php');

class ControladorEstatus{

  private $modelo;

  public function __CONSTRUCT(){
      $this->modelo = new Estatus();
  }

  public function Index(){
      require_once './vista/headerHTML.php';
      require_once './vista/estatus/shwEstatus.php';
  }

  public function Crud(){
      $entidadEstatus = new Estatus();
      if(isset($_REQUEST['id'])){
          $entidadEstatus = $this->modelo->Obtener($_REQUEST['id']);
      }

      require_once './vista/headerHTML.php';
      require_once './vista/estatus/updEstatus.php';

  }

  public function Guardar(){

    $entidadEstatus = new Estatus();

    $entidadEstatus->id            = $_REQUEST['txtId'];
    $entidadEstatus->clave         = $_REQUEST['txtClave'];
    $entidadEstatus->descripcion   = $_REQUEST['txtDescripcion'];

    if($entidadEstatus->id >0){
      $this->modelo->Actualizar($entidadEstatus);
      header('Location: ./controlador.php?gui=estatus');
    }
    else {
      $this->modelo->Registrar($entidadEstatus);
      if($_SESSION['errMsg']==0)
      {
        $this->Crud();
      }
      else{
        require_once './vista/headerHTML.php';
        require_once './vista/estatus/updEstatus.php';
      }
    }


}

  public function Eliminar(){
      $this->modelo->Eliminar($_REQUEST['id']);
      header('Location: ./controlador.php?gui=estatus');
  }

}
?>
