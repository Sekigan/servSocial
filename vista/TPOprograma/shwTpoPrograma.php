<div class="container-fluid box">
  <div id='encabezado' style="padding:0px;">
    <h3>Mostrando Registros de Tipo Programa</h3>
    <ol class="breadcrumb">
      <li>Sistema Informático - Servicio Social ITSaltillo</li>
      <li><a href="?c=TPOprograma&a=Crud&gui=TPOprograma">Agregar</a></li>
      <li><a href="./menu.php">Salir</a></li>
    </ol>
  </div>
  <table class="table  table-striped  table-hover" id="tabla" border="0">
    <thead>
      <tr>
        <th style="width:20%; background-color: #5DACCD; color:#fff; text-align:center;">ID</th>
        <th style="width:74%; background-color: #5DACCD; color:#fff">Nombre</th>
        <th style="width:8%; background-color: #5DACCD; color:#fff">Dependencia</th>
        <th style="width:8%; background-color: #5DACCD; color:#fff"></th>
        <th style="width:8%; background-color: #5DACCD; color:#fff"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($this->modelo->Listar('tipoprograma') as $r) : ?>
        <tr>
          <td align="center"><?php echo $r->id; ?></td>
          <td><?php echo $r->nombre; ?></td>
          <td><?php echo $r->Nombre_Dependencia; ?></td>
          <td>
            <a class="btn btn-warning" href="?c=TPOprograma&a=Crud&gui=TPOprograma&id=<?php echo $r->id; ?>">Editar</a>
          </td>
          <td>
            <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar el registro <?php echo $r->nombre . ' ' . $r->id; ?>?');" href="?c=TPOprograma&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  </body>
  <script src="repositorio/datatables/datatable.js"></script>

  </html>