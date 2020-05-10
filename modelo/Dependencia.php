<?php

class Dependencia
{

    private $pdo;

    public $id;
    public $clave;
    public $nombre;
    public $calle;
    public $noExt;
    public $colonia;
    public $telefono;
    public $contacto;
    public $telContacto;
    public $email;


    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM dependencia");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM dependencia WHERE id = ?");

            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try {
            $stm = $this->pdo
                ->prepare("DELETE FROM dependencia WHERE id = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data)
    {
        try {
            $sql = "UPDATE dependencia SET
						dependencia.clave = ?,
						dependencia.nombre = ?,
						dependencia.calle = ?,
						dependencia.noExt = ?,
						dependencia.colonia = ?,
						dependencia.telefono = ?,
						dependencia.contacto = ?,
						dependencia.telContacto = ?,
						dependencia.email = ?
				    WHERE dependencia.id = ? ";
            $this->pdo->prepare($sql)->execute(
                array(
                    $data->clave,
                    $data->nombre,
                    $data->calle,
                    $data->noExt,
                    $data->colonia,
                    $data->telefono,
                    $data->contacto,
                    $data->telContacto,
                    $data->email,
                    $data->id
                )
            );
        } catch (EXCEPTION $e) {
            $error = $e->getMessage();
            echo "<h2>" . $error . "</h2>";
            die($e->getMessage());
        }
    }

    public function Registrar($data)
    {

        $_SESSION['errMsg'] = 0;

        try {

            $sql = "INSERT INTO dependencia(clave, nombre, calle, noExt, colonia, telefono, contacto, telContacto, email)
		VALUES (?,?,?,?,?,?,?,?,?)";

            $this->pdo->prepare($sql)->execute(
                array(

                    $data->clave,
                    $data->nombre,
                    $data->calle,
                    $data->noExt,
                    $data->colonia,
                    $data->telefono,
                    $data->contacto,
                    $data->telContacto,
                    $data->email

                )
            );
        } catch (EXCEPTION $e) {
            if ($e) {
                $_SESSION['errMsg'] = 1;
            }
        }
    }
}
