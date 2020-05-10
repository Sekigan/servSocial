<div class="container-fluid box">
    <div id='encabezado' style="padding:10px;">
        <h3>Mostrando Registros de dependencia</h3>
        <ol class="breadcrumb">
            <li>Sistema Informático - Servicio Social ITSaltillo</li>
            <li><a href="?c=dependencia&a=Crud&gui=dependencia">Agregar</a></li>
            <li><a href="./menu.php">Salir</a></li>
        </ol>
    </div>
    <table class="table  table-striped  table-hover" id="tabla" border="0">
        <thead>
            <tr>
                <th style="width:20%; background-color: #5DACCD; color:#fff; text-align:center;">id</th>
                <th style="width:74%; background-color: #5DACCD; color:#fff">clave</th>
                <th style="width:8%; background-color: #5DACCD; color:#fff">nombre</th>
                <th style="width:8%; background-color: #5DACCD; color:#fff">calle</th>
                <th style="width:8%; background-color: #5DACCD; color:#fff">noExt</th>
                <th style="width:8%; background-color: #5DACCD; color:#fff">colonia</th>
                <th style="width:8%; background-color: #5DACCD; color:#fff">telefono</th>
                <th style="width:8%; background-color: #5DACCD; color:#fff">contacto</th>
                <th style="width:8%; background-color: #5DACCD; color:#fff">telContacto</th>
                <th style="width:8%; background-color: #5DACCD; color:#fff">email</th>
                <th style="width:8%; background-color: #5DACCD; color:#fff"></th>
                <th style="width:8%; background-color: #5DACCD; color:#fff"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->modelo->Listar() as $r) : ?>
                <tr>
                    <td align="center"><?php echo $r->id; ?></td>
                    <td><?php echo $r->clave; ?></td>
                    <td><?php echo $r->nombre; ?></td>
                    <td><?php echo $r->calle; ?></td>
                    <td><?php echo $r->noExt; ?></td>
                    <td><?php echo $r->colonia; ?></td>
                    <td><?php echo $r->telefono; ?></td>
                    <td><?php echo $r->contacto; ?></td>
                    <td><?php echo $r->telContacto; ?></td>
                    <td><?php echo $r->email; ?></td>
                    <td>
                        <a class="btn btn-warning" href="?c=dependencia&a=Crud&gui=dependencia&id=<?php echo $r->id; ?>">Editar</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar el registro <?php echo $r->clave . ' ' . $r->descripcion; ?>?');" href="?c=dependencia&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </body>
    <script src="repositorio/datatables/datatable.js"></script>

    </html>