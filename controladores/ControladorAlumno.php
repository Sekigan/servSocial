<?php

require_once('./modelo/Alumno.php');

class ControladorAlumno{

  private $modelo;

  public function __CONSTRUCT(){
      $this->modelo = new Alumno();
  }

  public function Index(){
      require_once './vista/headerHTML.php';
      require_once './vista/alumno/shwAlumno.php';
  }

  public function Crud(){
      $entidadalumno = new Alumno();
      if(isset($_REQUEST['id'])){
          $entidadalumno = $this->modelo->Obtener($_REQUEST['id']);
      }

      require_once './vista/headerHTML.php';
      require_once './vista/alumno/updalumno.php';

  }

  public function Guardar(){

    $entidadalumno = new Alumno();
    $entidadalumno->id                    = $_REQUEST['txtId'];
    $entidadalumno->clave                 = $_REQUEST['txtclave'];
    $entidadalumno->nombre                = $_REQUEST['txtnombre'];
    $entidadalumno->apPaterno             = $_REQUEST['apaterno'];
    $entidadalumno->apMaterno             = $_REQUEST['amaterno'];
    $entidadalumno->email                 = $_REQUEST['txtmail'];
    $entidadalumno->telefono              = $_REQUEST['txttel'];
    $entidadalumno->edad                  = $_REQUEST['txtedad'];
    $entidadalumno->sexo                  = $_REQUEST['txtsexo'];
    $entidadalumno->numCreditos           = $_REQUEST['txtnumCreditos'];
    $entidadalumno->ptoCredito            = $_REQUEST['%cred'];
    $entidadalumno->carreraId             = $_REQUEST['selCarrera'];
    $entidadalumno->semestre              = $_REQUEST['txtsem'];
    $entidadalumno->domicilio             = $_REQUEST['txtdomicilio'];
    $entidadalumno->municipioId           = $_REQUEST['selMun'];
    $entidadalumno->estadoId              = $_REQUEST['selEdo'];

    if($entidadalumno->id >0){
      $this->modelo->Actualizar($entidadalumno);
      header('Location: ./controlador.php?gui=alumno');
    }
    else {
      $this->modelo->Registrar($entidadalumno);
      if($_SESSION['errMsg']==0)
      {
        $this->Crud();
      }
      else{
        require_once './vista/headerHTML.php';
        require_once './vista/alumno/updAlumno.php';
      }
    }


}

  public function Eliminar(){
      $this->modelo->Eliminar($_REQUEST['id']);
      header('Location: ./controlador.php?gui=alumno');
  }

}
