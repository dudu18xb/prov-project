<?php

if (isset($_GET["id"])) {
    // verifica se existe um banner engine cadastrado
    $id = trim($_GET["id"]);
    $sql = "select * from banner where id = ? limit 1";
    $consulta = $con->prepare($sql);
    $consulta->bindParam(1, $id);
    $consulta->execute();
    $dados = $consulta->fetch(PDO::FETCH_OBJ);
    // separando os dados
    $id = $dados->id;
    $foto = $dados->foto;

    unlink ($foto = "../images/banner/" . $foto . "g.jpg");



    if (empty($dados->banner)) {
        $sql = "delete from banner where id = ? limit 1";
        $consulta = $con->prepare($sql);
        $consulta->bindParam(1, $id);
        if ($consulta->execute()) {
            //executou
            echo "<div class='alert alert-success'>Registro Excluído com Sucesso
					</div>";
        } else {
            //erro
            echo "<div class='alert alert-danger' style='text-align: center;'><p>Erro ao Excluir</p><br><h3 style='text-align: center;'>Cliente tem Algum Cadastro Ativo !!!</h3></div>";
        }
        //incluir a listagem novamente
        include "listarbanner.php";
    } else {
        echo "<div class='alert alert-danger'>O registro não pode ser excluído pois existe uma foto com esta categoria</div>";
    }
} else {
    echo "Erro ao excluir";
}
