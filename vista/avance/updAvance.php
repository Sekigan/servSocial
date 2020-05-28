<div class="container-fluid box" style="width:500px;">
  <h3><?php echo ($entidadavance->id != null ? 'Modificando Registros de programa' : 'Agregando programa'); ?></h3>
  <ol class="breadcrumb">
    <li>Sistema Informático - Servicio Social ITSaltillo</li>
    <li><a href="?c=avance&gui=avance">Salir</a></li>
  </ol>
  <form id="frmavance" action="?c=avance&a=Guardar&gui=Crud" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <input type="hidden" name="txtid" id="txtid" value="<?php echo $entidadavance->id; ?>" />
      <table class="table-responsive table-striped table-condensed" align="center">

        <tr>
          <td><label>Alumno</label></td>
          <td>
            <?php
            if ($entidadavance->id > 0) {
              echo "<select id='selAL' name='selAL' class='form-control'>";
              foreach ($this->modelo->Listar('alumno') as $alumno) :
                if ($_REQUEST['alumnoid'] != $alumno->id) {
                  echo "<option value='" . $alumno->id . "'>" . $alumno->nombre . $alumno->apPaterno . $alumno->apMaterno . "</option>";
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
          <td><label>Fecha Entrega</label></td>

          <td><input type="date" id="fEntrega" name="fEntrega" class="from-control" required></td>
        </tr>

        <tr>
          <td><label>desc Actividad</label></td>
          <td><input type="text" name="txtActividad" id="txtActividad" value="<?php echo $entidadavance->descActividad; ?>" class="form-control" placeholder="Ingrese el objetivo" required></td>
        </tr>

        <tr>
          <td><label>totHrs</label></td>
          <td><input type="text" name="totHrs" id="totHrs" value="<?php echo $entidadavance->totHrs; ?>" class="form-control" placeholder="Ingrese las horas" required></td>
        </tr>

        <tr>
          <td><label>No semanas</label></td>
          <td><input type="text" name="noSemanas" id="noSemanas" value="<?php echo $entidadavance->noSemanas; ?>" class="form-control" placeholder="Ingrese numero Semanas" required></td>
        </tr>
        <tr>
          <td><label>Fecha Inicio</label></td>

          <td><input type="date" id="fInicioPeriodo" name="fInicioPeriodo" class="from-control" required></td>
        </tr>
        <tr>
          <td><label>Fecha Fin</label></td>

          <td><input type="date" id="fTerminaPeriodo" name="fTerminaPeriodo" class="from-control" required></td>
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