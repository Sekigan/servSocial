<?php

class Estatus{

	private $pdo;

  public $id;
  public $clave;
  public $descripcion;

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

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM estatus");
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
			$stm = $this->pdo->prepare("SELECT * FROM estatus WHERE id = ?");

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
			            ->prepare("DELETE FROM estatus WHERE id = ?");

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
			$sql = "UPDATE estatus SET
						estatus.clave = ?,
						estatus.descripcion = ?
				    WHERE estatus.id = ?";
			$this->pdo->prepare($sql)->execute(
				    array(
							$data->clave,
              $data->descripcion,
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

		$sql = "INSERT INTO estatus (clave, descripcion)
		        VALUES (?, ?)";

		$this->pdo->prepare($sql)->execute(
				array(
					$data	->clave,
          $data	->descripcion
				)
			);
		}
		catch (EXCEPTION $e){
			if($e){$_SESSION['errMsg'] = 1;}
		}
	}

}

?>
