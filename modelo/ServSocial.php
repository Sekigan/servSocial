<?php

class ServSocial
{

	private $pdo;

	public $id;
	public $alumnoid;
	public $dependenciaid;
	public $programaid;
	public $coordinadorid;
	public $fInicio;
	public $fTermina;
	public $estatusid;
	public $fEstatus;


	public function __CONSTRUCT()
	{
		try {
			$this->pdo = Database::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}


	public function Listar($servSocial)
	{
		try {
			$result = array();
			switch ($servSocial) {
				case 'servSocial':
					$stm = $this->pdo->prepare("SELECT servSocial.id as id, 
												   servSocial.fInicio as fini,
												   servSocial.fTermina as fter, 
												   servSocial.fEstatus as fest, 
												   alumno.nombre||' '||alumno.apPaterno||' '||alumno.apMaterno as alumno, 
												   dependencia.nombre as depno, 
												   programa.nombre as prono, 
												   coordinador.nombre as cornom, 
												   estatus.descripcion as edesc 
												   FROM servSocial, alumno, dependencia, programa, coordinador, estatus 
												   WHERE servSocial.alumnoid = alumno.id and 
												   servSocial.dependenciaid = dependencia.id and 
												   servSocial.programaid = programa.id and 
												   servSocial.coordinadorid = coordinador.id and 
												   servSocial.estatusid = estatus.id ;
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
					$stm = $this->pdo->prepare("SELECT * FROM estatus ;");
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
			$stm = $this->pdo->prepare("SELECT * FROM servSocial WHERE id = ?");

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
				->prepare("DELETE FROM servSocial WHERE id = ?");

			$stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try {
			$sql = "UPDATE servSocial SET
						servSocial.alumnoid 		= ?,
						servSocial.dependenciaid 	= ?,
						servSocial.programaid		= ?,
						servSocial.coordinadorid	= ?,
						servSocial.fInicio			= ?,
						servSocial.fTermina			= ?,
						servSocial.estatusid		= ?,
						servSocial.fEstatus			= ?
				    WHERE servSocial.id 			= ?;";
			$this->pdo->prepare($sql)->execute(
				array(
					$data->alumnoid,
					$data->dependenciaid,
					$data->programaid,
					$data->coordinadorid,
					$data->fInicio,
					$data->fTermina,
					$data->estatusid,
					$data->fEstatus,
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

			$sql = "INSERT INTO servSocial (alumnoid, dependenciaid, programaid, coordinadorid, fInicio, fTermina, estatusid, fEstatus)
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)->execute(
				array(
					$data->alumnoid,
					$data->dependenciaid,
					$data->programaid,
					$data->coordinadorid,
					$data->fInicio,
					$data->fTermina,
					$data->estatusid,
					$data->fEstatus
				)
			);
		} catch (EXCEPTION $e) {
			if ($e) {
				$_SESSION['errMsg'] = 1;
			}
		}
	}
}
