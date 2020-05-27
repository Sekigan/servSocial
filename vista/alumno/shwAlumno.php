
<div class="container-fluid box " margin: 500;>
  <div id='encabezado' style="padding:0px; " >
    <h3>Mostrando Registros de alumno</h3>
    <ol class="breadcrumb">
      <li>Sistema Informático - Servicio Social ITSaltillo</li>
      <li><a href="?c=alumno&a=Crud&gui=alumno">Agregar</a></li>
      <li><a href="./menu.php">Salir</a></li>
    </ol> 
  </div>
  <table class="table  table-striped  table-hover" id="tabla" border="0">
      <thead>
          <tr>
            <th style="width:8%; background-color: #5DACCD; color:#fff; text-align:center;">id</th>
            <th style="width:8%; background-color: #5DACCD; color:#fff">clave</th>
            <th style="width:8%; background-color: #5DACCD; color:#fff">nombre</th>
            <th style="width:8%; background-color: #5DACCD; color:#fff">apPaterno</th>
            <th style="width:8%; background-color: #5DACCD; color:#fff">apMaterno</th>
            <th style="width:8%; background-color: #5DACCD; color:#fff">email</th>
            <th style="width:8%; background-color: #5DACCD; color:#fff">telefono</th>
            <th style="width:8%; background-color: #5DACCD; color:#fff">edad</th>
            <th style="width:8%; background-color: #5DACCD; color:#fff">sexo</th>
            <th style="width:8%; background-color: #5DACCD; color:#fff">numCreditos</th>
            <th style="width:8%; background-color: #5DACCD; color:#fff">%creditos</th>
            <th style="width:8%; background-color: #5DACCD; color:#fff">Carrera</th>
            <th style="width:8%; background-color: #5DACCD; color:#fff">semestre</th>
            <th style="width:8%; background-color: #5DACCD; color:#fff">domicilio</th>
            <th style="width:8%; background-color: #5DACCD; color:#fff">municipio</th>
            <th style="width:8%; background-color: #5DACCD; color:#fff">estado</th>
            <th style="width:8%; background-color: #5DACCD; color:#fff"></th>
            <th style="width:8%; background-color: #5DACCD; color:#fff"></th>
          </tr>
      </thead>
      <tbody>
      <?php foreach($this->modelo->Listar('alumno') as $r): ?>
          <tr>

            <td align="center"><?php echo $r->id; ?></td>
            <td><?php echo $r->clave; ?></td>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->apaterno; ?></td>
            <td><?php echo $r->amaterno; ?></td>
            <td><?php echo $r->email; ?></td>
            <td><?php echo $r->telefono; ?></td>
            <td><?php echo $r->edad; ?></td>
            <td><?php echo $r->sexo; ?></td>
            <td><?php echo $r->numcreditos; ?></td>
            <td><?php echo $r->porcentaje; ?></td>
            <td><?php echo $r->nomcarrera; ?></td>
            <td><?php echo $r->semestre; ?></td>
            <td><?php echo $r->domicilio; ?></td>
            <td><?php echo $r->nommun; ?></td>
            <td><?php echo $r->nomestado; ?></td>

            <td>
                <a class="btn btn-warning" href="?c=alumno&a=Crud&gui=alumno&id=<?php echo $r->id; ?>">Editar</a>
            </td>
            <td>
                <a class="btn btn-danger"
                onclick="javascript:return confirm('¿Seguro de eliminar el registro <?php echo $r->clave.' '.$r->nombre; ?>?');"
                href="?c=alumno&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
            </td>
          </tr>
      <?php endforeach; ?>
      </tbody>
  </table>
  </body>
  <script src="repositorio/datatables/datatable.js"></script>
</html>
