<div class="container-fluid box" style="width:500px;">
  <h3><?php echo ($entidadcoordinador->id != null ? 'Modificando Registros de Coordinador' : 'Agregando Coordinador'); ?></h3>
  <ol class="breadcrumb">
    <li>Sistema Informático - Servicio Social ITSaltillo</li>
    <li><a href="?c=coordinador&gui=coordinador">Salir</a></li>
  </ol>
  <form id="frmcoordinador" action="?c=coordinador&a=Guardar&gui=Crud" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <input type="hidden" name="txtId" id="txtId" value="<?php echo $entidadcoordinador->id; ?>" />
      <table class="table-responsive table-striped table-condensed" align="center">
        <tr>
          <td>
            <label>Clave</label>
          </td>
          <td>
            <?php
            echo ($entidadcoordinador->id > 0
              ? "<input type='text' name='txtClave' id='txtClave' value='$entidadcoordinador->clave' class='form-control' placeholder='Ingrese la Clave' readonly>"
              : "<input type='text' name='txtClave' id='txtClave' value='$entidadcoordinador->clave' class='form-control' placeholder='Ingrese la Clave' required autofocus>");
            ?>

          </td>
        </tr>

        <tr>
          <td><label>Nombre</label></td>
          <td><input type="text" name="txtnombre" id="txtnombre" value="<?php echo $entidadcoordinador->nombre; ?>" class="form-control" placeholder="Ingrese el nombre" required></td>
        </tr>

        <tr>
          <td><label>apPaterno</label></td>
          <td><input type="text" name="txtPaterno" id="txtPaterno" value="<?php echo $entidadcoordinador->apPaterno; ?>" class="form-control" placeholder="Ingrese el ap. paterno" required></td>
        </tr>

        <tr>
          <td><label>apMaterno</label></td>
          <td><input type="text" name="txtMaterno" id="txtMaterno" value="<?php echo $entidadcoordinador->apMaterno; ?>" class="form-control" placeholder="Ingrese el ap. materno" required></td>
        </tr>

        <tr>
          <td><label>email</label></td>
          <td><input type="text" name="txtmail" id="txtmail" value="<?php echo $entidadcoordinador->email; ?>" class="form-control" placeholder="Ingrese el correo electronico" required></td>
        </tr>

        <tr>
          <td><label>telefono</label></td>
          <td><input type="text" name="txttel" id="txttel" value="<?php echo $entidadcoordinador->nombre; ?>" class="form-control" placeholder="Ingrese el telefono" required></td>
        </tr>

        <tr>
          <td><label>Dependencia</label></td>
          <td>
            <?php
            if ($entidadcoordinador->id > 0) {
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