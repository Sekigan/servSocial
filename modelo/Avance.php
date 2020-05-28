<?php

class Avance
{

	private $pdo;

	public $id;
	public $alumnoid;
	public $fEntrega;
	public $descActividad;
	public $totHrs;
	public $noSemanas;
	public $fInicioPeriodo;
	public $fTerminaPeriodo;

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
				case 'avance':
					$stm = $this->pdo->prepare("SELECT avance.id as id, 
				avance.alumnoid as alumnoid,
				alumno.nombre as alumno,
				avance.descActividad as actividades,
				avance.fEntrega
				FROM avance, alumno
				WHERE avance.alumnoid = alumno.id ;
				");
					break;


				case 'alumno':
					$stm = $this->pdo->prepare("SELECT * FROM alumno;");
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
			$stm = $this->pdo->prepare("SELECT * FROM avance WHERE id = ?");

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
				->prepare("DELETE FROM avance WHERE id = ?");

			$stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try {
			$sql = "UPDATE avance SET
						avance.alumnoid=?,
						avance.fEntrega= ?,
						avance.descActividad = ?,
						avance.totHrs = ?,
						avance.noSemanas=?,
						avance.fInicioPeriodo=?,
						avance.fTerminaPeriodo=?						
				    	WHERE avance.id = ?";
			$this->pdo->prepare($sql)->execute(
				array(
					$data->alumnoid,
					$data->fEntrega,
					$data->descActividad,
					$data->totHrs,
					$data->noSemanas,
					$data->fInicioPeriodo,
					$data->fTerminaPeriodo,
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

			$sql = "INSERT INTO avance( alumnoid, fEntrega, descActividad, totHrs, noSemanas,fInicioPeriodo,fTerminaPeriodo)
						VALUES (?, ?, ?, ?, ?, ?,?)";



			$this->pdo->prepare($sql)->execute(
				array(
					$data->alumnoid,
					$data->fEntrega,
					$data->descActividad,
					$data->totHrs,
					$data->noSemanas,
					$data->fInicioPeriodo,
					$data->fTerminaPeriodo
				)
			);
		} catch (EXCEPTION $e) {
			if ($e) {
				$_SESSION['errMsg'] = 1;
			}
		}
	}
}
