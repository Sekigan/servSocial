 <script language="javascript">
   $(document).ready(function() {
     $("#selEST").change(function() {



       $("#selEST option:selected").each(function() {
         id_estado = $(this).val();

         $.post("vista/alumno/getMunicipio.php", {
           id_estado: id_estado
         }, function(data) {

           $("#selMUN").html(data);
         });
       });
     })
   });
 </script>

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
           <td><label>Clave</label></td>
           <td><input type="text" name="txtclave" id="txtclave" value="<?php echo $entidadalumno->clave; ?>" class="form-control" placeholder="Ingrese la clave" required></td>
         </tr>

         <tr>
           <td><label>Nombre</label></td>
           <td><input type="text" name="txtnombre" id="txtnombre" value="<?php echo $entidadalumno->nombre; ?>" class="form-control" placeholder="Ingrese el nombre" required></td>
         </tr>

         <tr>
           <td><label>Paterno</label></td>
           <td><input type="text" name="apaterno" id="apaterno" value="<?php echo $entidadalumno->apPaterno; ?>" class="form-control" placeholder="Ingrese el apPAterno " required></td>
         </tr>


         <tr>
           <td><label>Materno</label></td>
           <td><input type="text" name="amaterno" id="amaterno" value="<?php echo $entidadalumno->apMaterno; ?>" class="form-control" placeholder="Ingrese el apMaterno " required></td>
         </tr>

         <tr>
           <td><label>Email</label></td>
           <td><input type="text" name="txtmail" id="txtmail" value="<?php echo $entidadalumno->email; ?>" class="form-control" placeholder="Ingrese " required></td>
         </tr>

         <tr>
           <td><label>Telefono</label></td>
           <td><input type="text" name="txttel" id="txttel" value="<?php echo $entidadalumno->telefono; ?>" class="form-control" placeholder="Ingrese " required></td>
         </tr>

         <tr>
           <td><label>Edad</label></td>
           <td><input type="text" name="txtedad" id="txtedad" value="<?php echo $entidadalumno->edad; ?>" class="form-control" placeholder="Ingrese " required></td>
         </tr>

         <tr>
           <td><label>Sexo</label></td>

           <td><input type="text" name="txtsexo" id="txtsexo" value="<?php echo $entidadalumno->sexo; ?>" class="form-control" placeholder="Ingrese " required></td>
         </tr>

         <tr>
           <td><label>numCreditos</label></td>
           <td><input type="text" name="txtnumCreditos" id="txtnumCreditos" value="<?php echo $entidadalumno->numCreditos; ?>" class="form-control" placeholder="Ingrese " required></td>
         </tr>




         <tr>
           <td><label>Carrera</label></td>
           <td>
             <?php
              if ($entidadalumno->id > 0) {
                echo "<select id='selCAR' name='selCAR' class='form-control'>";
                foreach ($this->modelo->Listar('carrera') as $carreras) :
                  if ($_REQUEST['carreraid'] != $carreras->id) {
                    echo "<option value='" . $carreras->id . "'>" . $carreras->nombre . "</option>";
                  }
                endforeach;
              } else {
                echo "
                <select required id='selCAR' name='selCAR' class='form-control'>
                <option value='0'>Seleccione Carrera</option>
              ";
                foreach ($this->modelo->Listar('carrera') as $carreras) :
                  echo "<option value='" . $carreras->id . "'>" . $carreras->nombre . "</option>";
                endforeach;
              }
              ?>
           </td>
         </tr>


         <tr>
           <td><label>semestre</label></td>
           <td><input type="text" name="txtsem" id="txtsem" value="<?php echo $entidadalumno->semestre; ?>" class="form-control" placeholder="Ingrese " required></td>
         </tr>


         <tr>
           <td><label>domicilio</label></td>
           <td><input type="text" name="txtdomicilio" id="txtdomicilio" value="<?php echo $entidadalumno->domicilio; ?>" class="form-control" placeholder="Ingrese " required></td>
         </tr>


         <tr>
           <td><label>Estado</label></td>
           <td>
             <?php
              if ($entidadalumno->id > 0) {
                echo "<select id='selEST' name='selEST' class='form-control'>";
                foreach ($this->modelo->Listar('estado') as $estado) :
                  if ($_REQUEST['id'] != $estado->id) {
                    echo "<option value='" . $estado->id . "'>" . $estado->clave  . " " . $estado->nombre . "</option>";
                  }
                endforeach;
              } else {
                echo "
                <select required id='selEST' name='selEST' class='form-control'>
                <option value='0'>Seleccione Estado</option>
              ";
                foreach ($this->modelo->Listar('estado') as $estado) :
                  echo "<option value='" . $estado->id .  "'>" . $estado->clave  . " " . $estado->nombre . "</option>";
                endforeach;
              }
              ?>
           </td>
         </tr>

         <tr>
           <td>
           <td><label>municipio</label></td>
           <td><select name="selMUN" id="selMUN"></select>
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