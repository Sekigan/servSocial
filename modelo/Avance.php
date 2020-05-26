<?php

class Avance{

	private $pdo;

  public $id;
  public $alumnoId;
  public $fEntrega;
	public $descActividad;
	public $totHrs;
	public $noSemanas;
	public $fInicioPeriodo;
	public $fTerminaPeriodo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar($entidad)
	{
		try
		{
			$result = array();
			switch ($entidad) {
				case 'avance':
				$stm = $this->pdo->prepare("
				SELECT avance.id as id, avance.alumnoId as alumnoid, avance.fEntrega
				FROM avance, dependencia, tpoavances
				WHERE avance.dependenciaId = dependencia.id && avance.tpoavanceId = tpoavances.clave;
				");
				break;


				case 'dependencia':
					$stm = $this->pdo->prepare("SELECT * FROM dependencia;");
					break;

			case 'tipo':
				$stm = $this->pdo->prepare("SELECT * FROM tpoavances;");
				break;
			}

			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM avance WHERE id = ?");

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM avance WHERE id = ?");

			$stm->execute(array($id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE avance SET
						avance.id = ?,
						avance.nombre = ?,
						avance.objetivo = ?
						avance.actividades = ?
						avance.dependenciaId = ?
						avance.tpoavanceId = ?
				    WHERE avance.id = ?";
			$this->pdo->prepare($sql)->execute(
				    array(
							$data->nombre,
              $data->objetivo,
							$data->actividades,
							$data->dependenciaId,
							$data->tpoavanceId,
							$data->id

					)
				);

		} catch (EXCEPTION $e)
		{
			$error = $e->getMessage();
		  echo "<h2>".$error."</h2>";
			die($e->getMessage());
		}

	}

	public function Registrar($data){

		$_SESSION['errMsg'] = 0;

		try {

		$sql = "INSERT INTO avance( nombre, objetivo, actividades, dependenciaId, tpoavanceId)
						VALUES (?, ?, ?, ?, ?)";



		$this->pdo->prepare($sql)->execute(
				array(
					$data->nombre,
					$data->objetivo,
					$data->actividades,
					$data->dependenciaId,
					$data->tpoavanceId

				)
			);
		}
		catch (EXCEPTION $e){
			if($e){$_SESSION['errMsg'] = 1;}
			alert(print_r($data));
		}
	}

}

?>
