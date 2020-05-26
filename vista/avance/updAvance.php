
<div class="container-fluid box" style="width:500px;">
<h3><?php echo ($entidadprograma->id != null ? 'Modificando Registros de programa' : 'Agregando programa'); ?></h3>
<ol class="breadcrumb">
  <li>Sistema Informático - Servicio Social ITSaltillo</li>
  <li><a href="?c=programa&gui=programa">Salir</a></li>
</ol>
<form id="frmprograma" action="?c=programa&a=Guardar&gui=Crud" method="post" enctype="multipart/form-data">
<div class="form-group">
  <input type="hidden" name="txtId" id="txtId" value="<?php echo $entidadprograma->id; ?>" />
  <table class="table-responsive table-striped table-condensed" align="center">

    <tr>
      <td><label>Nombre</label></td>
      <td><input type="text" name="txtnombre"  id="txtnombre" value="<?php echo $entidadprograma->nombre; ?>" class="form-control" placeholder="Ingrese el nombre" required></td>
    </tr>

    <tr>
      <td><label>Objetivo</label></td>
      <td><input type="text" name="txtObjetivo"  id="txtObjetivo" value="<?php echo $entidadprograma->objetivo; ?>" class="form-control" placeholder="Ingrese el objetivo" required></td>
    </tr>

    <tr>
      <td><label>Actividades</label></td>
      <td><input type="text" name="txtActividad"  id="txtActividad" value="<?php echo $entidadprograma->actividades; ?>" class="form-control" placeholder="Ingrese las actividades" required></td>
    </tr>

    <tr>
      <td><label>Dependencia</label></td>
      <td>
        <?php
          if($entidadprograma->id > 0){
            echo "<select id='selDep' name='selDep' class='form-control'>";
            foreach($this->modelo->Listar('programa') as $nombreDependencia){
            echo "<option value='".$entidadprograma->id."'>".$nombreDependencia->pnom."</option>";
            break;
            }
            foreach($this->modelo->Listar('dependencia') as $nombreDependencia):
              if( $entidadprograma->dependenciaId != $nombreDependencia->id){
                echo "<option value='".$nombreDependencia->id."'>".$nombreDependencia->nombre."</option>";
              }
            endforeach;
          }
          else {
            echo "
                <select required id='selDep' name='selDep' class='form-control'>
                <option value='0'>Seleccione nombre de la dependencia</option>
              ";
              foreach($this->modelo->Listar('dependencia') as $nombreDependencia):
                echo "<option value='".$nombreDependencia->id."'>".$nombreDependencia->nombre."</option>";
              endforeach;

          }
        ?>
      </td>
    </tr>

    <tr>
      <td><label>Tipo de programa</label></td>
      <td>
        <?php
          if($entidadprograma->id > 0){
            echo "<select id='selTipo' name='selTipo' class='form-control'>";
            foreach($this->modelo->Listar('programa') as $nombreTipo){
            echo "<option value='".$entidadprograma->tpoid."'>".$nombreTipo->tpodesc."</option>";
            break;
            }
            foreach($this->modelo->Listar('tipo') as $nombreTipo):
              if( $entidadprograma->tpoProgramaId != $nombreTipo->clave){
                echo "<option value='".$nombreTipo->clave."'>".$nombreTipo->descripcion."</option>";
              }
            endforeach;
          }
          else {
            echo "
                <select required id='selTipo' name='selTipo' class='form-control'>
                <option value='0'>Seleccione el tipo de programa</option>
              ";
              foreach($this->modelo->Listar('tipo') as $nombreTipo):
                echo "<option value='".$nombreTipo->clave."'>".$nombreTipo->descripcion."</option>";
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
      <?php if($_SESSION['errMsg']==1){echo "<h4><font color='red'>No se ingreso el registro, revise sus datos!!</font></h4>";}?>
    </div>

</form>
