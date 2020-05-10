<div class="container-fluid box" style="width:500px;">
    <h3><?php echo ($entidaddependencia->id != null ? 'Modificando Registros de dependencia' : 'Agregando dependencia'); ?></h3>
    <ol class="breadcrumb">
        <li>Sistema Informático - Servicio Social ITSaltillo</li>
        <li><a href="?c=dependencia&gui=dependencia">Salir</a></li>
    </ol>
    <form id="frmdependencia" action="?c=dependencia&a=Guardar&gui=Crud" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="txtId" id="txtId" value="<?php echo $entidaddependencia->id; ?>" />
            <table class="table-responsive table-striped table-condensed" align="center">
                <tr>
                    <td>
                        <label>Clave</label>
                    </td>
                    <td>
                        <?php
                        echo ($entidaddependencia->id > 0
                            ? "<input type='text' name='txtClave' id='txtClave' value='$entidaddependencia->clave' class='form-control' placeholder='Ingrese la Clave' readonly>"
                            : "<input type='text' name='txtClave' id='txtClave' value='$entidaddependencia->clave' class='form-control' placeholder='Ingrese la Clave' required autofocus>");
                        ?>
                    </td>
                </tr>

                <tr>
                    <td><label>nombre</label></td>
                    <td><input type="text" name="txtNombre" id="txtNombre" value="<?php echo $entidaddependencia->nombre; ?>" class="form-control" placeholder="Ingrese el nombre" required></td>
                </tr>

                <tr>
                    <td><label>calle</label></td>
                    <td><input type="text" name="txtCalle" id="txtCalle" value="<?php echo $entidaddependencia->calle; ?>" class="form-control" placeholder="Ingrese la calle" required></td>
                </tr>

                <tr>
                    <td><label>noExt</label></td>
                    <td><input type="text" name="txtNoExt" id="txtNoExt" value="<?php echo $entidaddependencia->noExt; ?>" class="form-control" placeholder="Ingrese el noExt" required></td>
                </tr>

                <tr>
                    <td><label>colonia</label></td>
                    <td><input type="text" name="txtColonia" id="txtColonia" value="<?php echo $entidaddependencia->colonia; ?>" class="form-control" placeholder="Ingrese la colonia" required></td>
                </tr>

                <tr>
                    <td><label>telefono</label></td>
                    <td><input type="text" name="txtTelefono" id="txtTelefono" value="<?php echo $entidaddependencia->telefono; ?>" class="form-control" placeholder="Ingrese el telefono" required></td>
                </tr>

                <tr>
                    <td><label>contacto</label></td>
                    <td><input type="text" name="txtContacto" id="txtContacto" value="<?php echo $entidaddependencia->contacto; ?>" class="form-control" placeholder="Ingrese el contacto" required></td>
                </tr>

                <tr>
                    <td><label>telContacto</label></td>
                    <td><input type="text" name="txtTelContacto" id="txtTelContacto" value="<?php echo $entidaddependencia->telContacto; ?>" class="form-control" placeholder="Ingrese el telContacto" required></td>
                </tr>

                <tr>
                    <td><label>email</label></td>
                    <td><input type="text" name="txtEmail" id="txtEmail" value="<?php echo $entidaddependencia->email; ?>" class="form-control" placeholder="Ingrese el email" required></td>
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