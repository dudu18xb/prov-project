<?php

//verificar se foi dado post
if ($_POST) {
    //se foi - salvar/alterar
    //recuperar os dados enviados
    $nome_contato = trim($_POST["nome"]);
    $email_contato = trim($_POST["email"]);
    $assunto_contato = trim($_POST["assunto"]);
    $mensagem_contato = trim($_POST["mensagem"]);


    //montar o sql para inserir ou atualizar
    if (empty($id)) {
        //inserir
        $sql = "insert into contato (id,nome,email,assunto,mensagem) values (NULL,'$nome_contato','$email_contato','$assunto_contato','$mensagem_contato')";
    } else {
        //atualizar
        $sql = " update contato set 
                    nome = '$nome_contato',
                    email = '$email_contato',
                    assunto = '$assunto_contato',
                    mensagem = '$mensagem_contato'      
                    where id = $id limit 1";
        //executar
    }
    $consulta = $con->prepare($sql);
    //passar os parametros
    $consulta->bindParam(1, $nome_contato);
    $consulta->bindParam(2, $email_contato);
    $consulta->bindParam(3, $assunto_contato);
    $consulta->bindParam(4, $mensagem_contato);



    if (!empty($id))
        $consulta->bindParam(5, $id);
    //verificar se executa

    if ($consulta->execute()) {
        echo "
        <header class='masthead text-center text-white d-flex'>
            <div class='container my-auto'>
             <div class='row'>
            <div class='col-lg-10 mx-auto'>
                <h1 class='text-uppercase'>
                    <strong>Sua Solicitação foi mandando com sucesso</strong>
                </h1>
                <hr>
            </div>
            <div class='col-lg-8 mx-auto'>
                <a class='btn btn-primary btn-xl js-scroll-trigger' href='index.php'>Voltar ao Inicio</a>
            </div>
        </div>
        </div>
    </header>
        
        
        
        
        ";
    } else {
        echo "
        <header class='masthead text-center text-white d-flex'>
            <div class='container my-auto'>
             <div class='row'>
            <div class='col-lg-10 mx-auto'>
                <h1 class='text-uppercase'>
                    <strong>Ocorreu Algum Erro</strong>
                    <strong>Por Favor Tente Novamente !!!</strong>
                </h1>
                <hr>
            </div>
            <div class='col-lg-8 mx-auto'>
                <a class='btn btn-primary btn-xl js-scroll-trigger' href='index.php'>Voltar ao Inicio</a>
            </div>
        </div>
        </div>
    </header>
        
        
        ";
    }
} else {
    //se não foi - erro
    echo "
        <header class='masthead text-center text-white d-flex'>
            <div class='container my-auto'>
             <div class='row'>
            <div class='col-lg-10 mx-auto'>
                <h1 class='text-uppercase'>
                    <strong>Erro Ao Enviar o Formulario</strong>
                    <strong>Por Favor Tente Novamente !!!</strong>
                </h1>
                <hr>
            </div>
            <div class='col-lg-8 mx-auto'>
                <a class='btn btn-primary btn-xl js-scroll-trigger' href='index.php'>Voltar ao Inicio</a>
            </div>
        </div>
        </div>
    </header>";
}