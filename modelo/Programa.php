<?php

class Programa
{

	private $pdo;

	public $id;
	public $nombre;
	public $objetivo;
	public $actividades;
	public $dependenciaid;
	public $tpoprogramaid;

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
				case 'programa':
					$stm = $this->pdo->prepare("
				SELECT programa.id as id,
					   programa.nombre as nombre,
					   programa.objetivo as objetivo,
					   programa.actividades as actividades,
					   dependencia.id as depid,
					   dependencia.nombre as depnom,
					   tipoprograma.id as tpoid,
					   tipoprograma.nombre as tpodesc
					   FROM programa, dependencia, tipoprograma 
					   WHERE programa.dependenciaid = dependencia.id and 
					   		 programa.tpoprogramaid = tipoprograma.id ;
				");
					break;


				case 'dependencia':
					$stm = $this->pdo->prepare("SELECT * FROM dependencia;");
					break;

				case 'tipo':
					$stm = $this->pdo->prepare("SELECT * FROM tipoprograma;");
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
			$stm = $this->pdo->prepare("SELECT * FROM programa WHERE id = ?");

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
				->prepare("DELETE FROM programa WHERE id = ?");

			$stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try {
			$sql = "UPDATE programa SET
						programa.nombre = ?,
						programa.objetivo = ?,
						programa.actividades = ?,
						programa.dependenciaid = ?,
						programa.tpoprogramaid = ?
				    WHERE programa.id = ?";
			$this->pdo->prepare($sql)->execute(
				array(
					$data->nombre,
					$data->objetivo,
					$data->actividades,
					$data->dependenciaid,
					$data->tpoprogramaid,
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

			$sql = "INSERT INTO programa(nombre, objetivo, actividades, dependenciaid, tpoprogramaid)
						VALUES (?, ?, ?, ?, ?)";



			$this->pdo->prepare($sql)->execute(
				array(
					$data->nombre,
					$data->objetivo,
					$data->actividades,
					$data->dependenciaid,
					$data->tpoprogramaid
				)
			);
		} catch (EXCEPTION $e) {
			if ($e) {
				$_SESSION['errMsg'] = 1;
			}
		}
	}
}
