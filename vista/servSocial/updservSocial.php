<div class="container-fluid box" style="width:500px;">
  <h3><?php echo ($entidadservSocial->id != null ? 'Modificando Registros de servicio social' : 'Agregando servicio social'); ?></h3>
  <ol class="breadcrumb">
    <li>Sistema Informático - Servicio Social ITSaltillo</li>
    <li><a href="?c=ServSocial&gui=servSocial">Salir</a></li>
  </ol>
  <form id="frmservSocial" action="?c=ServSocial&a=Guardar&gui=Crud" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <input type="hidden" name="txtId" id="txtId" value="<?php echo $entidadservSocial->id; ?>" />
      <table class="table-responsive table-striped table-condensed" align="center">

        <tr>
          <td><label>Alumno</label></td>
          <td>
            <?php
            if ($entidadservSocial->id > 0) {
              echo "<select id='selAL' name='selAL' class='form-control'>";
              foreach ($this->modelo->Listar('alumno') as $alumno) :
                if ($_REQUEST['alumnoid'] != $alumno->id) {
                  echo "<option value='" . $alumno->id . "'>" . $alumno->nombre . "</option>";
                }
              endforeach;
            } else {
              echo "
                <select id='selAL' name='selAL' class='form-control'>
                <option value='0'>Seleccione Alumno</option>
              ";
              foreach ($this->modelo->Listar('alumno') as $alumno) :
                echo "<option value='" . $alumno->id . "'>" . $alumno->nombre . "</option>";
              endforeach;
            }
            ?>
          </td>
        </tr>

        <tr>
          <td><label>Dependencia</label></td>
          <td>
            <?php
            if ($entidadservSocial->id > 0) {
              echo "<select id='selDEP' name='selDEP' class='form-control'>";
              foreach ($this->modelo->Listar('dependencia') as $dependencias) :
                if ($_REQUEST['dependenciaid'] != $dependencias->id) {
                  echo "<option value='" . $dependencias->id . "'>" . $dependencias->nombre . "</option>";
                }
              endforeach;
            } else {
              echo "
                <select required id='selDEP' name='selDEP' class='form-control'>
                <option value='0'>Seleccione Dependencia</option>
              ";
              foreach ($this->modelo->Listar('dependencia') as $dependencias) :
                echo "<option value='" . $dependencias->id . "'>" . $dependencias->nombre . "</option>";
              endforeach;
            }
            ?>
          </td>
        </tr>

        <tr>
          <td><label>Programa</label></td>
          <td>
            <?php
            if ($entidadservSocial->id > 0) {
              echo "<select id='selPRO' name='selPRO' class='form-control'>";
              foreach ($this->modelo->Listar('programa') as $programa) :
                if ($_REQUEST['programaid'] != $programa->id) {
                  echo "<option value='" . $programa->id . "'>" . $programa->nombre . "</option>";
                }
              endforeach;
            } else {
              echo "
                <select id='selPRO' name='selPRO' class='form-control'>
                <option value='0'>Seleccione Programa</option>
              ";
              foreach ($this->modelo->Listar('programa') as $programa) :
                echo "<option value='" . $programa->id . "'>" . $programa->nombre . "</option>";
              endforeach;
            }
            ?>
          </td>
        </tr>

        <tr>
          <td><label>Coordinador</label></td>
          <td>
            <?php
            if ($entidadservSocial->id > 0) {
              echo "<select id='selCOOR' name='selCOOR' class='form-control'>";
              foreach ($this->modelo->Listar('coordinador') as $coor) :
                if ($_REQUEST['coordniadorid'] != $coor->id) {
                  echo "<option value='" . $coor->id . "'>" . $coor->nombre . "</option>";
                }
              endforeach;
            } else {
              echo "
                <select id='selCOOR' name='selCOOR' class='form-control'>
                <option value='0'>Seleccione Coordinador</option>
              ";
              foreach ($this->modelo->Listar('coordinador') as $coor) :
                echo "<option value='" . $coor->id . "'>" . $coor->nombre . "</option>";
              endforeach;
            }
            ?>
          </td>
        </tr>


        <tr>
          <td><label>Fecha inicio</label></td>

          <td><input type="date" id='"txtfIni"' name="txtfIni"  class="from-control" required></td>
        </tr>

        <tr>
          <td><label for="start">Fecha de cierre</label></td>
          <td><input type="date" id="txtfTer" name="txtfTer" class="from-control" required></td>
        </tr>

        <tr>
          <td><label>Estatus</label></td>
          <td>
            <?php
            if ($entidadservSocial->id > 0) {
              echo "<select id='selESTA' name='selESTA' class='form-control'>";
              foreach ($this->modelo->Listar('estatus') as $esta) :
                if ($_REQUEST['estatusid'] != $esta->id) {
                  echo "<option value='" . $esta->id . "'>" . $esta->descripcion . "</option>";
                }
              endforeach;
            } else {
              echo "
                <select id='selESTA' name='selESTA' class='form-control'>
                <option value='0'>Seleccione Coordinador</option>
              ";
              foreach ($this->modelo->Listar('estatus') as $esta) :
                echo "<option value='" . $esta->id . "'>" . $esta->descripcion . "</option>";
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
            <input type="date" id="txtfEst" name="txtfEst" class="from-control" required>
        </tr>
      </table>
      <hr />

      <div class="text-right">
        <button class="btn btn-primary" id="btnGuardar">Guardar</button>
      </div>
      <div align="center">
        <?php if ($_SESSION['errMsg'] == 1) {
          echo "<h4><font color='red'>No se ingreso el registro, revise sus datos!!</font></h4>";
        } ?>
      </div>

  </form>