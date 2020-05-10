<?php

class TPOprograma
{
    private $pdo;

    public $id;
    public $idDependencia;
    public $nombre;


    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar($entidad)
    {
        try {
            $result = array();
            switch ($entidad) {
                case 'tipoprograma':
                    $stm = $this->pdo->prepare("
							SELECT t.id as id, t.nombre as nombre, d.nombre as Nombre_Dependencia
							FROM dependencia d, tipoprograma t
							WHERE
							t.idDependencia=d.id;
							");
                    break;
                case 'dependencias':
                    $stm = $this->pdo->prepare("SELECT * FROM dependencia ;");
                    break;
            }

            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM tipoprograma WHERE id = ?");

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
                ->prepare("DELETE FROM tipoprograma WHERE id = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data)
    {
        try {
            $sql = "UPDATE tipoprograma SET
						tipoprograma.nombre = ?,
						tipoprograma.idDependencia = ?
					WHERE tipoprograma.id = ?";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->nombre,
                    $data->idDependencia,
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

            $sql = "INSERT INTO tipoprograma(nombre,idDependencia) 
		        VALUES (?, ?)";
            
            $this->pdo->prepare($sql)->execute(
                array(
                    $data->nombre,
                    $data->idDependencia
                )
            );
        } catch (EXCEPTION $e) {
            if ($e) {
                $_SESSION['errMsg'] = 1;
            }
        }
    }
}
