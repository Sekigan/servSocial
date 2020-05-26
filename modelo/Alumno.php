<?php

class Alumno{

	private $pdo;

  	public $id;
  	public $clave;
	public $nombre;
	public $apPaterno;
	public $apMaterno;
	public $email;
	public $telefono;
	public $edad;
	public $sexo;
	public $numCreditos;
	public $ptoCredito;
	public $carreraId;
	public $semestre;
	public $domicilio;
	public $municipioId;
	public $estadoId;

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
				case 'alumno':
				$stm = $this->pdo->prepare("
				SELECT alumno.id as id, alumno.clave as clave, alumno.nombre as nombre,
				alumno.apPaterno as apaterno,
				alumno.apMaterno as amaterno, alumno.email as email,
				alumno.telefono as telefono, alumno.edad as edad, alumno.sexo as sexo,
				alumno.numCreditos as numcreditos, alumno.ptoCredito as porcentaje,
				alumno.carreraId as carreraid, alumno.semestre as semestre,
				alumno.domicilio as domicilio, alumno.municipioId as municipioid,
				alumno.estadoId as estadoid,
				carrera.id as idcarrera, carrera.nombre as nomcarrera,
				municipio.id as idmun, municipio.nombre as nommun, estado.id as idestado,
				estado.nombre as nomestado
				FROM alumno, carrera, municipio, estado
				WHERE alumno.municipioId = municipio.id && alumno.carreraId = carrera.id && alumno.estadoId = estado.id;
				");
				break;

				case 'carrera':
					$stm = $this->pdo->prepare("SELECT * FROM carrera;");
					break;

			case 'municipio':
				$stm = $this->pdo->prepare("SELECT * FROM municipio;");
				break;

				case 'estado':
					$stm = $this->pdo->prepare("SELECT * FROM estado;");
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
			$stm = $this->pdo->prepare("SELECT * FROM alumno WHERE id = ?");

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
			            ->prepare("DELETE FROM alumno WHERE id = ?");

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
			$sql = "UPDATE alumno SET
						alumno.id = ?,
						alumno.clave = ?,
						alumno.nombre = ?,
						alumno.apPaterno = ?,
						alumno.apMaterno = ?,
						alumno.email = ?,
						alumno.telefono = ?,
						alumno.edad = ?,
						alumno.sexo = ?,
						alumno.numCreditos = ?,
						alumno.ptoCredito = ?,
						alumno.carreraId = ?,
						alumno.semestre = ?,
						alumno.domicilio = ?,
						alumno.municipioId = ?,
						alumno.estadoId = ?,
				    WHERE alumno.id = ?";
			$this->pdo->prepare($sql)->execute(
				    array(
							$data->id,
              $data->clave,
							$data->nombre,
							$data->apPaterno,
							$data->apMaterno,
							$data->email,
							$data->telefono,
							$data->edad,
							$data->sexo,
							$data->numCreditos,
							$data->ptoCredito,
							$data->carreraId,
							$data->semestre,
							$data->domicilio,
							$data->municipioId,
							$data->estadoId,
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

		$sql = "INSERT INTO alumno(clave, nombre, apPaterno,
		apMaterno, email, telefono, edad, sexo, numCreditos,
		ptoCredito, carreraId, semestre, domicilio, municipioId, estadoId)
		VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";



		$this->pdo->prepare($sql)->execute(
				array(
					$data->clave,
					$data->nombre,
					$data->apPaterno,
					$data->apMaterno,
					$data->email,
					$data->telefono,
					$data->edad,
					$data->sexo,
					$data->numCreditos,
					$data->ptoCredito,
					$data->carreraId,
					$data->semestre,
					$data->domicilio,
					$data->municipioId,
					$data->estadoId
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
