<?php

//verificar se foi dado post
if ($_POST) {
    //se foi - salvar/alterar
    //recuperar os dados enviados
    $id = trim($_POST["id"]);
    $login = trim($_POST["login"]);
    $nome = trim($_POST["nome"]);
    $senha = trim($_POST["senha"]);


    //montar o sql para inserir ou atualizar
    if (empty($id)) {
        //inserir
        $sql = "insert into sistema values
			(NULL, ? , ? , md5(?))";
        //NULL, nome, login , senha
    } else {
        //atualizar
        $sql = "update sistema set login = ?, nome = ?, senha = md5(?) where id = ? limit 1";
    }
    //executar
    $consulta = $con->prepare($sql);
    //passar os parametros
    $consulta->bindParam(1, $login);
    $consulta->bindParam(2, $nome);
    $consulta->bindParam(3, $senha);
    if (!empty($id))
        $consulta->bindParam(4, $id);
    //verificar se executa

    if ($consulta->execute()) {
        echo "<div class='alert alert-success'>Registro Salvo/Alterado com sucesso!</div>
            <div class = 'pull-right'>
                <a href = 'home.php?pg=listarusuariosistema' class = 'btn btn-success' title = 'Listar'>
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