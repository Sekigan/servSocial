<div class="container-fluid box" style="width:500px;">
    <h3><?php echo ($entidadmunicipio->id != null ? 'Modificando Registros de municipio' : 'Agregando municipio'); ?></h3>
    <ol class="breadcrumb">
        <li>Sistema Informático - Servicio Social ITSaltillo</li>
        <li><a href="?c=municipio&gui=municipio">Salir</a></li>
    </ol>
    <form id="frmmunicipio" action="?c=municipio&a=Guardar&gui=Crud" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="txtId" id="txtId" value="<?php echo $entidadmunicipio->id; ?>" />
            <table class="table-responsive table-striped table-condensed" align="center">
                <tr>
                    <td>
                        <label>Clave</label>
                    </td>
                    <td>
                        <?php
                        echo ($entidadmunicipio->id > 0
                            ? "<input type='text' name='txtClave' id='txtClave' value='$entidadmunicipio->clave' class='form-control' placeholder='Ingrese la Clave' readonly>"
                            : "<input type='text' name='txtClave' id='txtClave' value='$entidadmunicipio->clave' class='form-control' placeholder='Ingrese la Clave' required autofocus>");
                        ?>

                    </td>
                </tr>

                <tr>
                    <td><label>Nombre</label></td>
                    <td><input type="text" name="txtnombre" id="txtnombre" value="<?php echo $entidadmunicipio->nombre; ?>" class="form-control" placeholder="Ingrese el nombre" required></td>
                </tr>

                <tr>
                    <td><label>Estado</label></td>
                    <td>
                        <?php
                        if ($entidadmunicipio->id > 0) {
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