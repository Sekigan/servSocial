<?php

class Municipio
{

	private $pdo;

	public $id;
	public $clave;
	public $nombre;
	public $cveEstado;

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
				case 'municipio':
					$stm = $this->pdo->prepare("
				SELECT municipio.id as id, municipio.clave as clave, municipio.nombre as nombre,
				estado.nombre as nomEstado
				FROM municipio, estado
				WHERE
				municipio.cveEstado = estado.id;
				");
					break;
				case 'estado':
					$stm = $this->pdo->prepare("SELECT * FROM estado;");
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
			$stm = $this->pdo->prepare("SELECT * FROM municipio WHERE id = ?");

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
				->prepare("DELETE FROM municipio WHERE id = ?");

			$stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try {
			$sql = "UPDATE municipio SET
						municipio.clave = ?,
						municipio.nombre = ?,
						municipio.cveEstado = ?
				    WHERE municipio.id = ?";
			$this->pdo->prepare($sql)->execute(
				array(
					$data->clave,
					$data->nombre,
					$data->cveEstado,
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

			$sql = "INSERT INTO municipio (clave, nombre, cveEstado)
		        VALUES (?, ?, ?)";

			$this->pdo->prepare($sql)->execute(
				array(
					$data->clave,
					$data->nombre,
					$data->cveEstado
				)
			);
		} catch (EXCEPTION $e) {
			if ($e) {
				$_SESSION['errMsg'] = 1;
			}
		}
	}
}
