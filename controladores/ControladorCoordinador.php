<?php

require_once('./modelo/Coordinador.php');

class ControladorCoordinador{

  private $modelo;

  public function __CONSTRUCT(){
      $this->modelo = new coordinador();
  }

  public function Index(){
      require_once './vista/headerHTML.php';
      require_once './vista/coordinador/shwCoordinador.php';
  }

  public function Crud(){
      $entidadcoordinador = new Coordinador();
      if(isset($_REQUEST['id'])){
          $entidadcoordinador = $this->modelo->Obtener($_REQUEST['id']);
      }

      require_once './vista/headerHTML.php';
      require_once './vista/coordinador/updCoordinador.php';

  }

  public function Guardar(){

    $entidadcoordinador = new Coordinador();

    $entidadcoordinador->id                   = $_REQUEST['txtId'];
    $entidadcoordinador->clave                = $_REQUEST['txtClave'];
    $entidadcoordinador->nombre               = $_REQUEST['txtnombre'];
    $entidadcoordinador->apPaterno            = $_REQUEST['txtPaterno'];
    $entidadcoordinador->apMaterno            = $_REQUEST['txtMaterno'];
    $entidadcoordinador->email                = $_REQUEST['txtmail'];
    $entidadcoordinador->telefono             = $_REQUEST['txttel'];
    $entidadcoordinador->dependenciaId        = $_REQUEST['selDep'];



    if($entidadcoordinador->id >0){
      $this->modelo->Actualizar($entidadcoordinador);
      header('Location: ./controlador.php?gui=coordinador');
    }
    else {
      $this->modelo->Registrar($entidadcoordinador);
      if($_SESSION['errMsg']==0)
      {
        $this->Crud();
      }
      else{
        require_once './vista/headerHTML.php';
        require_once './vista/coordinador/updCoordinador.php';
      }
    }


}

  public function Eliminar(){
      $this->modelo->Eliminar($_REQUEST['id']);
      header('Location: ./controlador.php?gui=coordinador');
  }

}
?>
