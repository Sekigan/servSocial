<?php

class ServSocial{

 private $pdo;

  public $id;
  public $alumnoId;
  public $dependenciaId;
  public $programaId;
  public $coordinadorId;
  public $fInicio;
  public $fTermina;
  public $estatusId;
  public $fEstatus;


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

  public function fechaInicio($id)
	{
		try
		{
		$stm = $this->pdo->prepare("Select YEAR(finicio) AS 'Year', MONTH(finicio) As 'MONTH' , DAY(finicio)  as day From servsocial where id = $id;");
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar($servSocial)
	{
		try
		{
			$result = array();
			switch ($servSocial) {
				case 'servSocial':
				$stm = $this->pdo->prepare("
				SELECT servSocial.id as id, servSocial.fInicio as fini, servSocial.fTermina as fter, servSocial.fEstatus as fest,
        alumno.nombre as alumno, dependencia.nombre as depno, programa.nombre as prono, coordinador.nombre as cornom, estatus.descripcion as edesc
        FROM servSocial, alumno, dependencia, programa, coordinador, estatus
				WHERE servSocial.alumnoId = alumno.id && servSocial.dependenciaId = dependencia.id && servSocial.programaId = programa.id
				&& servSocial.coordinadorId = coordinador.id && servSocial.estatusId = estatus.id;
				");
				break;
				case 'alumno':
					$stm = $this->pdo->prepare("SELECT * FROM alumno;");
				break;
				case 'dependencia':
					$stm = $this->pdo->prepare("SELECT * FROM dependencia;");
				break;
				case 'programa':
					$stm = $this->pdo->prepare("SELECT * FROM programa;");
				break;
				case 'coordinador':
					$stm = $this->pdo->prepare("SELECT * FROM coordinador;");
				break;
				case 'estatus':
					$stm = $this->pdo->prepare("SELECT * FROM estatus;");
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
			$stm = $this->pdo->prepare("SELECT * FROM servSocial WHERE id = ?");

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
			            ->prepare("DELETE FROM servSocial WHERE id = ?");

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
			$sql = "UPDATE servSocial SET
						servSocial.alumnoId 		= ?,
						servSocial.dependenciaId 	= ?,
						servSocial.programaId		= ?,
						servSocial.coordinadorId	= ?,
						servSocial.fInicio			= ?,
						servSocial.fTermina			= ?,
						servSocial.estatusId		= ?,
						servSocial.fEstatus			= ?,
				    WHERE servSocial.id 			= ?";
			$this->pdo->prepare($sql)->execute(
				    array(
							$data->alumnoId,
							$data->dependenciaId,
							$data->programaId,
							$data->coordinadorId,
							$data->fInicio,
							$data->fTermina,
							$data->estatusId,
							$data->fEstatus,
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

		$sql = "INSERT INTO servSocial (alumnoId, dependenciaId, programaId, coordinadorId, fInicio, fTermina, estatusId, fEstatus)
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)->execute(
				array(
					$data->alumnoId,
					$data->dependenciaId,
					$data->programaId,
					$data->coordinadorId,
					$data->fInicio,
					$data->fTermina,
					$data->estatusId,
					$data->fEstatus
				)
			);
		}
		catch (EXCEPTION $e){
			if($e){$_SESSION['errMsg'] = 1;}
		}
	}

}

?>
