<div class="container-fluid box" style="width:500px;">
    <h3><?php echo ($entidadestado->id != null ? 'Modificando Registros de estado' : 'Agregando estado'); ?></h3>
    <ol class="breadcrumb">
        <li>Sistema Informático - Servicio Social ITSaltillo</li>
        <li><a href="?c=estado&gui=estado">Salir</a></li>
    </ol>
    <form id="frmestado" action="?c=estado&a=Guardar&gui=Crud" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="txtId" id="txtId" value="<?php echo $entidadestado->id; ?>" />
            <table class="table-responsive table-striped table-condensed" align="center">
                <tr>
                    <td>
                        <label>Clave</label>
                    </td>
                    <td>
                        <?php
                        echo ($entidadestado->id > 0
                            ? "<input type='text' name='txtClave' id='txtClave' value='$entidadestado->clave' class='form-control' placeholder='Ingrese la Clave' readonly>"
                            : "<input type='text' name='txtClave' id='txtClave' value='$entidadestado->clave' class='form-control' placeholder='Ingrese la Clave' required autofocus>");
                        ?>

                    </td>
                </tr>

                <tr>
                    <td><label>Nombre</label></td>
                    <td><input type="text" name="txtnombre" id="txtnombre" value="<?php echo $entidadestado->nombre; ?>" class="form-control" placeholder="Ingrese el nombre" required></td>
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