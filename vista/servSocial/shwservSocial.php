<div class="container-fluid box">
  <div id='encabezado' style="padding:0px;">
    <h3>Mostrando Registros de servicio social</h3>
    <ol class="breadcrumb">
      <li>Sistema Informático - Servicio Social ITSaltillo</li>
      <li><a href="?c=ServSocial&a=Crud&gui=servSocial">Agregar</a></li>
      <li><a href="./menu.php">Salir</a></li>
    </ol>
  </div>
  <table class="table  table-striped  table-hover" id="tabla" border="0">
    <thead>
      <tr>
        <th style="width:8%; background-color: #5DACCD; color:#fff">N° servicio</th>
        <th style="width:8%; background-color: #5DACCD; color:#fff">Alumno</th>
        <th style="width:8%; background-color: #5DACCD; color:#fff">Dependencia</th>
        <th style="width:8%; background-color: #5DACCD; color:#fff">Programa</th>
        <th style="width:8%; background-color: #5DACCD; color:#fff">Coordinador</th>
        <th style="width:8%; background-color: #5DACCD; color:#fff">Fecha de inicio</th>
        <th style="width:8%; background-color: #5DACCD; color:#fff">Fecha de termino</th>
        <th style="width:8%; background-color: #5DACCD; color:#fff">Estatus </th>
        <th style="width:8%; background-color: #5DACCD; color:#fff">Fecha de estatus </th>
        <th style="width:8%; background-color: #5DACCD; color:#fff"></th>
        <th style="width:8%; background-color: #5DACCD; color:#fff"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($this->modelo->Listar('servSocial') as $r) : ?>
        <tr>

          <td><?php echo $r->id; ?></td>
          <td><?php echo $r->alumno; ?></td>
          <td><?php echo $r->depno; ?></td>
          <td><?php echo $r->prono; ?></td>
          <td><?php echo $r->cornom; ?></td>
          <td><?php echo $r->fini; ?></td>
          <td><?php echo $r->fter; ?></td>
          <td><?php echo $r->edesc; ?></td>
          <td><?php echo $r->fest; ?></td>


          <td>
            <a class="btn btn-warning" href="?c=ServSocial&a=Crud&gui=servSocial&id=<?php echo $r->id; ?>">Editar</a>
          </td>
          <td>
            <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar el registro <?php echo $r->clave . ' ' . $r->nombre; ?>?');" href="?c=ServSocial&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  </body>
  <script src="repositorio/datatables/datatable.js"></script>

  </html>