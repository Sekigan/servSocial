
<?php
$id_estado = $_POST['id_estado'];
try {
    $conexion = new PDO('mysql:host=localhost;dbname=servSocial', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



    $str = "SELECT id, nombre FROM municipio WHERE cveEstado = $id_estado";
    $data = $conexion->query($str);

    $html = "<option value='0'>Seleccionar Municipio</option>";
    while ($row = $data->fetch(PDO::FETCH_OBJ)) {

        $html .= "<option value='" . $row->id . "'>"  . $row->nombre . "</option>";
    }
} catch (PDOException $prueba_error) {
    echo "Error: " . $prueba_error->getMessage();
}

echo $html;
?>