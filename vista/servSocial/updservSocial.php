
<div class="container-fluid box" style="width:500px;">
<h3><?php echo ($entidadservSocial->id != null ? 'Modificando Registros de servicio social' : 'Agregando servicio social'); ?></h3>
<ol class="breadcrumb">
  <li>Sistema Informático - Servicio Social ITSaltillo</li>
  <li><a href="?c=servSocial&gui=servSocial">Salir</a></li>
</ol>
<form id="frmservSocial" action="?c=servSocial&a=Guardar&gui=Crud" method="post" enctype="multipart/form-data">
<div class="form-group">
  <input type="hidden" name="txtId" id="txtId" value="<?php echo $entidadservSocial->id; ?>" />
  <table class="table-responsive table-striped table-condensed" align="center">

    <tr>
      <td><label>Alumno</label></td>
      <td>
        <?php 
          if($entidadservSocial->id > 0){
            echo "<select id='txtaluId' name='txtaluId' class='form-control'>";
            foreach($this->modelo->Listar('alumno') as $nombreAlumno){
            echo "<option value='".$entidadservSocial->alumnoId."'>".$nombreAlumno->nombre."</option>";
            break;
            }
            foreach($this->modelo->Listar('alumno') as $nombreAlumno):
              if( $entidadservSocial->alumnoId != $nombreAlumno->id){
                echo "<option value='".$nombreAlumno->id."'>".$nombreAlumno->nombre."</option>";
              }
            endforeach;
          }
          else {
            echo "
                <select required id='txtaluId' name='txtaluId' class='form-control'>
                <option value='0'>Seleccione nombre del alumno</option>
              ";
              foreach($this->modelo->Listar('alumno') as $nombreAlumno):
                echo "<option value='".$nombreAlumno->id."'>".$nombreAlumno->nombre."</option>";
              endforeach;

          }
        ?>
      </td>
    </tr>

    <tr>
      <td><label>Dependencia</label></td>
      <td>
        <?php
          if($entidadservSocial->id > 0){
            echo "<select id='txtdepId' name='txtdepId' class='form-control'>";
            foreach($this->modelo->Listar('dependencia') as $nombreDepen){
            echo "<option value='".$entidadservSocial->dependenciaId."'>".$nombreDepen->nombre."</option>";
            break;
            }
            foreach($this->modelo->Listar('dependencia') as $nombreDepen):
              if( $entidadservSocial->dependenciaId != $nombreDepen->id){
                echo "<option value='".$nombreDepen->id."'>".$nombreDepen->nombre."</option>";
              }
            endforeach;
          }
          else {
            echo "
                <select required id='txtdepId' name='txtdepId' class='form-control'>
                <option value='0'>Seleccione nombre de dependencia</option>
              ";
              foreach($this->modelo->Listar('dependencia') as $nombreDepen):
                echo "<option value='".$nombreDepen->id."'>".$nombreDepen->nombre."</option>";
              endforeach;

          }
        ?>
      </td>
    </tr>

    <tr>
      <td><label>Programa</label></td>
      <td>
        <?php
          if($entidadservSocial->id > 0){
            echo "<select id='txtproId' name='txtproId' class='form-control'>";
            foreach($this->modelo->Listar('programa') as $nombrePrograma){
            echo "<option value='".$entidadservSocial->programaId."'>".$nombrePrograma->nombre."</option>";
            break;
            }
            foreach($this->modelo->Listar('programa') as $nombrePrograma):
              if( $entidadservSocial->programaId != $nombreEstado->id){
                echo "<option value='".$nombrePrograma->id."'>".$nombrePrograma->nombre."</option>";
              }
            endforeach;
          }
          else {
            echo "
                <select required id='txtproId' name='txtproId' class='form-control'>
                <option value='0'>Seleccione nombre del estado</option>
              ";
              foreach($this->modelo->Listar('programa') as $nombrePrograma):
                echo "<option value='".$nombrePrograma->id."'>".$nombrePrograma->nombre."</option>";
              endforeach;

          }
        ?>
      </td>
    </tr>

    <tr>
      <td><label>Coordinador</label></td>
      <td>
        <?php
          if($entidadservSocial->id > 0){
            echo "<select id='txtcoorId' name='txtcoorId' class='form-control'>";
            foreach($this->modelo->Listar('coordinador') as $nombreCoordinador){
            echo "<option value='".$entidadservSocial->coordinadorId."'>".$nombreCoordinador->nombre."</option>";
            break;
            }
            foreach($this->modelo->Listar('coordinador') as $nombreCoordinador):
              if( $entidadservSocial->coordinadorId != $nombreCoordinador->id){
                echo "<option value='".$nombreCoordinador->id."'>".$nombreCoordinador->nombre."</option>";
              }
            endforeach;
          }
          else {
            echo "
                <select required id='txtcoorId' name='txtcoorId' class='form-control'>
                <option value='0'>Seleccione nombre del coordinador</option>
              ";
              foreach($this->modelo->Listar('coordinador') as $nombreCoordinador):
                echo "<option value='".$nombreCoordinador->id."'>".$nombreCoordinador->nombre."</option>";
              endforeach;

          }
        ?>
      </td>
    </tr>


    <tr>
      <td><label>Fecha inicio</label></td>
      <?php $aiuda = $this->modelo->fechaInicio($entidadservSocial->id)?>
      <td><input type="date"  id='"txtfIni"' name="txtfIni" value="<?php echo $aiuda->anio/$aiuda->mes/$aiuda->dia; ?>" class="from-control" required ></td>
    </tr>

    <tr>
      <td><label for="start">Fecha de cierre</label></td>
      <td><input type="date" id="txtfTer" name="txtfTer" class="from-control" required></td>
    </tr>

    <tr>
      <td><label>Estatus</label></td>
      <td>
        <?php
          if($entidadservSocial->id > 0){
            echo "<select id='txtestId' name='txtestId' class='form-control'>";
            foreach($this->modelo->Listar('estatus') as $nombreEstatus){
            echo "<option value='".$entidadservSocial->estatusId."'>".$nombreEstatus->descripcion."</option>";
            break;
            }
            foreach($this->modelo->Listar('estatus') as $nombreEstatus):
              if( $entidadservSocial->estatusId != $nombreEstatus->id){
                echo "<option value='".$nombreEstatus->id."'>".$nombreEstatus->descripcion."</option>";
              }
            endforeach;
          }
          else {
            echo "
                <select required id='txtestId' name='txtestId' class='form-control'>
                <option value='0'>Seleccione el estatus</option>
              ";
              foreach($this->modelo->Listar('estatus') as $nombreEstatus):
                echo "<option value='".$nombreEstatus->id."'>".$nombreEstatus->descripcion."</option>";
              endforeach;

          }
        ?>
      </td>
    </tr>

    <tr>
      <td>
      <label for="start">Fecha de estatus</label>
    </td>
    <td>
      <input type="date" id="txtfEst" name="txtfEst" class="from-control" required
    </td>
    </tr>


  </table>

    <hr/>

    <div class="text-right">
        <button class="btn btn-primary" id="btnGuardar">Guardar</button>
    </div>
    <div align="center">
      <?php if($_SESSION['errMsg']==1){echo "<h4><font color='red'>No se ingreso el registro, revise sus datos!!</font></h4>";}?>
    </div>

</form>
