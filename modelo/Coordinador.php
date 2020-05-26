<?php

class Coordinador{

	private $pdo;

  public $id;
  public $clave;
  public $nombre;
	public $apPaterno;
	public $apMaterno;
	public $email;
	public $telefono;
	public $dependenciaId;

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
				case 'coordinador':
				$stm = $this->pdo->prepare("
				SELECT coordinador.id as id, coordinador.clave as clave, coordinador.nombre as nombre,
			 coordinador.apPaterno as apPaterno, coordinador.apMaterno as apMaterno, coordinador.email as email, coordinador.telefono as tel, coordinador.dependenciaId as iddep,
				dependencia.id as depid, dependencia.nombre as depnom
				FROM coordinador, dependencia
				WHERE
				coordinador.dependenciaId = dependencia.id;
				");
				break;
				case 'dependencia':
					$stm = $this->pdo->prepare("SELECT * FROM dependencia;");
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
			$stm = $this->pdo->prepare("SELECT * FROM coordinador WHERE id = ?");

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
			            ->prepare("DELETE FROM coordinador WHERE id = ?");

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
			$sql = "UPDATE coordinador SET
						coordinador.clave = ?,
						coordinador.nombre = ?,
						coordinador.apPaterno = ?,
						coordinador.apMaterno = ?,
						coordinador.email = ?,
						coordinador.telefono = ?,
						coordinador.dependenciaId = ?
				    WHERE coordinador.id = ?";
			$this->pdo->prepare($sql)->execute(
				    array(
							$data->clave,
              $data->nombre,
							$data->apPaterno,
							$data->apMaterno,
							$data->email,
							$data->telefono,
							$data->dependenciaId,
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

		$sql = "INSERT INTO coordinador(clave, nombre, apPaterno, apMaterno, email, telefono, dependenciaId)
		VALUES (?,?,?,?,?,?,?)";

		$this->pdo->prepare($sql)->execute(
				array(
					$data->clave,
					$data->nombre,
					$data->apPaterno,
					$data->apMaterno,
					$data->email,
					$data->telefono,
					$data->dependenciaId
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
