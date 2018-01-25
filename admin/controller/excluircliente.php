<?php
	//verificar se existe a var id
	if (isset($_GET["id"])) {

		//verificar se existe um cliente  
		$id = trim($_GET["id"]);
		$sql = "select * from cliente where id = ? limit 1";
		$consulta = $con->prepare($sql);
		$consulta->bindParam(1,$id);
		$consulta->execute();
		$dados = $consulta->fetch(PDO::FETCH_OBJ);

		if (empty($dados->cliente)) {
			//excluir da tabela
			$sql = "delete from cliente where id = ? limit 1";
			$consulta = $con->prepare($sql);
			$consulta->bindParam(1,$id);
			//verificar se executa
			if ($consulta->execute()) {
				//executou
				echo "<div class='alert alert-success'>Registro Excluído com Sucesso
					</div>";	
			} else {
				//erro
				echo "<div class='alert alert-danger' style='text-align: center;'><p>Erro ao Excluir</p><br><h3 style='text-align: center;'>Cliente tem Algum Cadastro Ativo !!!</h3></div>";
			}
			
			//incluir a listagem novamente
			include "listarcliente.php";

		} else {
			echo "<div class='alert alert-danger'>O registro não pode ser excluído pois existe uma foto com esta categoria</div>";
		}


	} else {
		echo "Erro ao excluir";
	}