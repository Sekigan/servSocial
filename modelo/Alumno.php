<?php

class Alumno
{

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
	public $carreraid;
	public $semestre;
	public $domicilio;
	public $municipioid;
	public $estadoid;

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
				case 'alumno':
					$stm = $this->pdo->prepare("
				SELECT alumno.id as id,
				 alumno.clave as clave,
				 alumno.nombre as nombre,
				 alumno.apPaterno as apaterno,
				 alumno.apMaterno as amaterno,
				 carrera.nombre as nomcarrera,
				 alumno.email as email,
				 alumno.telefono as telefono,
				 alumno.edad as edad,
				 alumno.sexo as sexo,
				 alumno.numCreditos as numcreditos,
				 alumno.ptoCreditos as porcentaje,
				 alumno.semestre as semestre,
				 alumno.domicilio as domicilio,
				 municipio.nombre as nommun,
				 estado.nombre as nomestado 
				 FROM alumno, carrera, municipio, estado
				 WHERE alumno.municipioid = municipio.id and 
				 alumno.carreraid = carrera.id and 
				 alumno.estadoid = estado.id ;
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
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try {
			$stm = $this->pdo->prepare("SELECT * FROM alumno WHERE id = ?");

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerMun($id)
	{
		try {
			$stm = $this->pdo->prepare("SELECT id, nombre FROM municipio WHERE cveEstado = ?");

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
				->prepare("DELETE FROM alumno WHERE id = ?");

			$stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try {
			$sql = "UPDATE alumno SET
						alumno.clave = ?,
						alumno.nombre = ?,
						alumno.apPaterno = ?,
						alumno.apMaterno = ?,
						alumno.email = ?,
						alumno.telefono = ?,
						alumno.edad = ?,
						alumno.sexo = ?,
						alumno.numCreditos = ?,
						alumno.ptoCreditos = ?,
						alumno.carreraid = ?,
						alumno.semestre = ?,
						alumno.domicilio = ?,
						alumno.municipioid = ?,
						alumno.estadoid = ?
					WHERE alumno.id = ?";

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
					$data->carreraid,
					$data->semestre,
					$data->domicilio,
					$data->municipioid,
					$data->estadoid,
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

			$sql = "INSERT INTO alumno(clave, nombre, apPaterno,
		apMaterno, email, telefono, edad, sexo, numCreditos,
		ptoCreditos, carreraid, semestre, domicilio, municipioid, estadoid)
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
					$data->carreraid,
					$data->semestre,
					$data->domicilio,
					$data->municipioid,
					$data->estadoid
				)
			);
		} catch (EXCEPTION $e) {
			if ($e) {
				$_SESSION['errMsg'] = 1;
			}
		}
	}
	public function promedio($numCreditos)
	{

		(int) $promedio = 0;

		(int) $mul = (int) $numCreditos / 260;
		(int) $promedio = $mul * 100;

		return (int) $promedio;
	}
}
