
<div class="container-fluid box" style="width:500px;">
<h3><?php echo ($entidadEstatus->id != null ? 'Modificando Registros de Estatus' : 'Agregando Estatus'); ?></h3>
<ol class="breadcrumb">
  <li>Sistema Informático - Servicio Social ITSaltillo</li>
  <li><a href="?c=estatus&gui=estatus">Salir</a></li>
</ol>
<form id="frmEstatus" action="?c=estatus&a=Guardar&gui=Crud" method="post" enctype="multipart/form-data">
<div class="form-group">
  <input type="hidden" name="txtId" id="txtId" value="<?php echo $entidadEstatus->id; ?>" />
  <table class="table-responsive table-striped table-condensed" align="center">
    <tr>
      <td>
        <label>Clave</label>
      </td>
      <td>
        <?php
          echo ($entidadEstatus->id > 0
            ? "<input type='text' name='txtClave' id='txtClave' value='$entidadEstatus->clave' class='form-control' placeholder='Ingrese la Clave' readonly>"
            : "<input type='text' name='txtClave' id='txtClave' value='$entidadEstatus->clave' class='form-control' placeholder='Ingrese la Clave' required autofocus>");
        ?>

      </td>
    </tr>

    <tr>
      <td><label>Descripción</label></td>
      <td><input type="text" name="txtDescripcion"  id="txtDescripcion" value="<?php echo $entidadEstatus->descripcion; ?>" class="form-control" placeholder="Ingrese la descripcion" required></td>
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
