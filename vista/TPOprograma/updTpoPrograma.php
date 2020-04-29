
<div class="container-fluid box" style="width:500px;">
<h3><?php echo ($entidadTPOprog->id != null ? 'Modificando Registros de Tipo Programa' : 'Agregando Programa'); ?></h3>
<ol class="breadcrumb">
  <li>Sistema Informático - Servicio Social ITSaltillo</li>
  <li><a href="?c=TPOprograma&gui=TPOprograma">Salir</a></li>
</ol>
<form id="frmTPOprograma" action="?c=TPOprograma&a=Guardar&gui=Crud" method="post" enctype="multipart/form-data">
<div class="form-group">
  <input type="hidden" name="txtId" id="txtId" value="<?php echo $entidadTPOprog->id; ?>" />
  <table class="table-responsive table-striped table-condensed" align="center">
    <tr>
      <td>
        <label>ID Programa</label>
      </td>
      <td>
        <?php
          echo ($entidadTPOprog->id > 0
            ? "<input type='text' name='txtId' id='txtId' value='$entidadTPOprog->id' class='form-control' placeholder='Ingrese el ID' readonly>"
            : "<input type='text' name='txtId' id='txtId' value='$entidadTPOprog->id' class='form-control' placeholder='Ingrese el ID' required autofocus>");
        ?>

      </td>
    </tr>

    <tr>
      <td><label>Nombre</label></td>
      <td><input type="text" name="txtNombre"  id="txtNombre" value="<?php echo $entidadTPOprog->nombre; ?>" class="form-control" placeholder="Ingrese el nombre" required></td>
    </tr>

    <tr>
      <td><label>Id Depedencia</label></td>
      <td><input type="text" name="txtDependencia"  id="txtDependencia" value="<?php echo $entidadTPOprog->idDependencia; ?>" class="form-control" placeholder="Ingrese el id de la dependencia" required></td>
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
