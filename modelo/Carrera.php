<?php

class carrera
{

    private $pdo;

    public $id;
    public $clave;
    public $nombre;

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

            $stm = $this->pdo->prepare("SELECT * FROM carrera");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM carrera WHERE id = ?");

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
                ->prepare("DELETE FROM carrera WHERE id = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data)
    {
        try {
            $sql = "UPDATE carrera SET
						carrera.clave = ?,
						carrera.nombre = ?
				    WHERE carrera.id = ?";
            $this->pdo->prepare($sql)->execute(
                array(
                    $data->clave,
                    $data->nombre,
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

            $sql = "INSERT INTO carrera (clave, nombre)
		        VALUES (?, ?)";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->clave,
                    $data->nombre
                )
            );
        } catch (EXCEPTION $e) {
            if ($e) {
                $_SESSION['errMsg'] = 1;
            }
        }
    }
}
