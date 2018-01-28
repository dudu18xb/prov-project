<?php

//verificar se foi dado post
if ($_POST) {
    //se foi - salvar/alterar
    //recuperar os dados enviados
    $id = trim($_POST["id"]);
    $nome = trim($_POST["nome"]);

    //montar o sql para inserir ou atualizar
    if (empty($id)) {
        //inserir
        $sql = "insert into categoria values
			(NULL, ?)";
        //NULL, nome
    } else {
        //atualizar
        $sql = "update categoria set nome = ? where id = ? limit 1";
    }
    //executar
    $consulta = $con->prepare($sql);
    //passar os parametros
    $consulta->bindParam(1, $nome);
    if (!empty($id))
        $consulta->bindParam(2, $id);
    //verificar se executa

    if ($consulta->execute()) {
        echo "<div class='alert alert-success'>Registro Salvo/Alterado com sucesso!</div>
            <div class = 'pull-right'>
                <a href = 'home.php?pg=listarcategoria' class = 'btn btn-success' title = 'Listar'>
                    Visualizar a Lista Novamente
                </a>
            </div>";
    } else {
        echo "<div class='alert alert-block alert-danger'>Erro ao Salvar/Alterar</div>";
    }
} else {
    //se não foi - erro
    echo "<div class='alert alert-block alert-danger'>
		Erro ao acessar página</div>";
}