
<div class="container-fluid box" style="width:500px;">
<h3><?php echo ($entidadalumno->id != null ? 'Modificando Registros de Alumno' : 'Agregando Alumno'); ?></h3>
<ol class="breadcrumb">
  <li>Sistema Informático - Servicio Social ITSaltillo</li>
  <li><a href="?c=alumno&gui=alumno">Salir</a></li>
</ol>
<form id="frmalumno" action="?c=alumno&a=Guardar&gui=Crud" method="post" enctype="multipart/form-data">
<div class="form-group">
  <input type="hidden" name="txtId" id="txtId" value="<?php echo $entidadalumno->id; ?>" />
  <table class="table-responsive table-striped table-condensed" align="center">

    <tr>
      <td><label>clave</label></td>
      <td><input type="text" name="txtclave"  id="txtclave" value="<?php echo $entidadalumno->clave; ?>" class="form-control" placeholder="Ingrese la clave" required></td>
    </tr>

    <tr>
      <td><label>nombre</label></td>
      <td><input type="text" name="txtnombre"  id="txtnombre" value="<?php echo $entidadalumno->nombre; ?>" class="form-control" placeholder="Ingrese el nombre" required></td>
    </tr>

    <tr>
      <td><label>ap. Paterno</label></td>
      <td><input type="text" name="apaterno"  id="apaterno" value="<?php echo $entidadalumno->apPaterno; ?>" class="form-control" placeholder="Ingrese el apPAterno " required></td>
    </tr>


    <tr>
      <td><label>ap Materno</label></td>
      <td><input type="text" name="amaterno"  id="amaterno" value="<?php echo $entidadalumno->apMaterno; ?>" class="form-control" placeholder="Ingrese el apMaterno " required></td>
    </tr>

    <tr>
      <td><label>email</label></td>
      <td><input type="text" name="txtmail"  id="txtmail" value="<?php echo $entidadalumno->email; ?>" class="form-control" placeholder="Ingrese " required></td>
    </tr>

    <tr>
      <td><label>telefono</label></td>
      <td><input type="text" name="txttel"  id="txttel" value="<?php echo $entidadalumno->telefono; ?>" class="form-control" placeholder="Ingrese " required></td>
    </tr>

    <tr>
      <td><label>edad</label></td>
      <td><input type="text" name="txtedad"  id="txtedad" value="<?php echo $entidadalumno->edad; ?>" class="form-control" placeholder="Ingrese " required></td>
    </tr>

    <tr>
      <td><label>sexo</label></td>
      <td><input type="text" name="txtsexo"  id="txtsexo" value="<?php echo $entidadalumno->sexo; ?>" class="form-control" placeholder="Ingrese " required></td>
    </tr>

    <tr>
      <td><label>numCreditos</label></td>
      <td><input type="text" name="txtnumCreditos"  id="txtnumCreditos" value="<?php echo $entidadalumno->numCreditos; ?>" class="form-control" placeholder="Ingrese " required></td>
    </tr>

    <tr>
      <td><label>%Creditos</label></td>
      <td><input type="text" name="%cred"  id="%cred" value="<?php echo $entidadalumno->ptoCredito; ?>" class="form-control" placeholder="Ingrese " required></td>
    </tr>


    <tr>
      <td><label>Carrera</label></td>
      <td>
        <?php
          if($entidadalumno->id > 0){
            echo "<select id='selCarrera' name='selCarrera' class='form-control'>";
            foreach($this->modelo->Listar('alumno') as $nombreDependencia){
            echo "<option value='".$entidadalumno->carreraId."'>".$nombreDependencia->nomcarrera."</option>";
            break;
            }
            foreach($this->modelo->Listar('carrera') as $nombreDependencia):
              if( $entidadalumno->carreraId != $nombreDependencia->id){
                echo "<option value='".$nombreDependencia->id."'>".$nombreDependencia->nombre."</option>";
              }
            endforeach;
          }
          else {
            echo "
                <select required id='selCarrera' name='selCarrera' class='form-control'>
                <option value='0'>Seleccione nombre de la carrera</option>
              ";
              foreach($this->modelo->Listar('carrera') as $nomcarrera):
                echo "<option value='".$nomcarrera->id."'>".$nomcarrera->nombre."</option>";
              endforeach;

          }
        ?>
      </td>
    </tr>


    <tr>
      <td><label>semestre</label></td>
      <td><input type="text" name="txtsem"  id="txtsem" value="<?php echo $entidadalumno->semestre; ?>" class="form-control" placeholder="Ingrese " required></td>
    </tr>


    <tr>
      <td><label>domicilio</label></td>
      <td><input type="text" name="txtdomicilio"  id="txtdomicilio" value="<?php echo $entidadalumno->domicilio; ?>" class="form-control" placeholder="Ingrese " required></td>
    </tr>



    <tr>
      <td><label>municipio</label></td>
      <td>
        <?php
          if($entidadalumno->id > 0){
            echo "<select id='selMun' name='selMun' class='form-control'>";
            foreach($this->modelo->Listar('municipio') as $nombreDependencia){
            echo "<option value='".$entidadalumno->municipioId."'>".$nombreDependencia->nombre."</option>";
            break;
            }
            foreach($this->modelo->Listar('municipio') as $nombreDependencia):
              if( $entidadalumno->municipioId != $nombreDependencia->idmun){
                echo "<option value='".$nombreDependencia->id."'>".$nombreDependencia->nombre."</option>";
              }
            endforeach;
          }
          else {
            echo "
                <select required id='selMun' name='selMun' class='form-control'>
                <option value='0'>Seleccione el municipio</option>
              ";
              foreach($this->modelo->Listar('municipio') as $nombremunicipio):
                echo "<option value='".$nombremunicipio->id."'>".$nombremunicipio->nombre."</option>";
              endforeach;

          }
        ?>
      </td>
    </tr>

    <tr>
      <td><label>estado</label></td>
      <td>
        <?php
          if($entidadalumno->id > 0){
            echo "<select id='selEdo' name='selEdo' class='form-control'>";
            foreach($this->modelo->Listar('estado') as $nomestado){
            echo "<option value='".$entidadalumno->estadoId."'>".$nomestado->nombre."</option>";
            break;
            }
            foreach($this->modelo->Listar('estado') as $nomestado):
              if( $entidadalumno->idestado != $nomestado->id){
                echo "<option value='".$nomestado->id."'>".$nomestado->nombre."</option>";
              }
            endforeach;
          }
          else {
            echo "
                <select required id='selEdo' name='selEdo' class='form-control'>
                <option value='0'>Seleccione el estado</option>
              ";
              foreach($this->modelo->Listar('estado') as $nomedo):
                echo "<option value='".$nomedo->id."'>".$nomedo->nombre."</option>";
              endforeach;

          }
        ?>
      </td>
    </tr>

    <tr>
      <td><label>fecha plz</label></td>
      <td><input type="date" name="dsadsad"  id="dasda`" class="form-control" required></td>
    </tr>



  </table>

    <hr />

    <div class="text-right">
        <button class="btn btn-primary" id="btnGuardar">Guardar</button>
    </div>
    <div align="center">
      <?php if($_SESSION['errMsg']==1){echo "<h4><font color='red'>No se ingreso el registro, revise sus datos!!</font></h4>";}?>
    </div>

</form>
