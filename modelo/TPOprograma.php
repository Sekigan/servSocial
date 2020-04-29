<?php

class TPOprograma{

	private $pdo;

  public $id;
  public $nombre;
  public $idDependencia;

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

			$stm = $this->pdo->prepare("SELECT * FROM tipoprograma");
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
			$stm = $this->pdo->prepare("SELECT * FROM tipoprograma WHERE id = ?");

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
			            ->prepare("DELETE FROM tipoprograma WHERE id = ?");

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
			$sql = "UPDATE tipoprograma SET
						tipoprograma.nombre = ?,
						tipoprograma.idDependencia = ?
				    WHERE tipoprograma.id = ?";
			$this->pdo->prepare($sql)->execute(
				    array(
							$data->nombre,
                            $data->idDependencia,
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

		$sql = "INSERT INTO `tipoprograma` (`id`, `nombre`, `idDependencia`) VALUES (?, ?, ?); ";
        
		$this->pdo->prepare($sql)->execute(
				array(
                    $data   ->id,
					$data	->nombre,
                    $data	->idDependencia
				)
            );
            
		}
		catch (EXCEPTION $e){
			if($e){$_SESSION['errMsg'] = 1;}
		}
	}

}

?>
