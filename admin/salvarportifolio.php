<?php

if ($_POST) {
    // recuperando os dados da categorias fotos
    $id_categoria = trim($_POST["id_categoria"]);
    $nome = trim($_POST["nome"]);
    $url = trim($_POST["url"]);


    
    if (!empty($_FILES["foto"]["name"])) {
        // verificando se esta enviando um JPG
        $tipo = $_FILES["foto"]["type"];
        $arquivo = $_FILES["foto"]["name"];
        $tmp = $_FILES["foto"]["tmp_name"];
        $pasta = "../images/thumbnails/";
        

        $destino = $pasta . $arquivo;

        if ($tipo != "image/jpeg") {
            echo "<div class='alert alert-danger'>Seleciona um arquivo JPG, Tipo de arquivo: $tipo</div>";
        } // else do tipo
        else if (copy($tmp, $destino)) {
            // incluir a funcao
            include "imagemportifolio.php";
            // criar um novo nome
            $novo = time();
            LoadImg($destino, $novo, $pasta);
            
        } else {
            echo "<div class='alert alert-danger'> Erro ao copiar o arquivo $arquivo</div>";
        }
    }// if do $_FILES
    // verificar se esta preenchido
    if (!isset($novo))
        $novo = "";

    
    // se vai inserir ou atualizar

    if (empty($id)) {
        // se for realmente inserir
        $sql = "insert into portifolio (id,id_categoria,nome,url,foto) values (NULL, '$id_categoria','$nome','$url','$novo')";
        
    } else {    
        // para fazer um update 
        
        $sql = "update portifolio set id_categoria = '$id_categoria', nome = '$nome', url = '$url', foto = '$novo' where id = $id limit 1";
        
    }

    //echo $sql;  //testando para ver
    // gravar no banco de dados
    $consulta = $con->prepare($sql);
    if ($consulta->execute()) {
        // se realmente executou 
        echo "<div class='alert alert-success'>Registro Salvo/Alterado com sucesso!</div>
            <div class = 'pull-right'>
                <a href = 'home.php?pg=listarportifolio' class = 'btn btn-success' title = 'Listar'>
                    Visualizar a Lista Novamente
                </a>
            </div>";
    } else {
        // se deu algum errro
        echo "<div class='alert alert-danger'>Erro ao Salvar</div>";
    }
} // else do POST
else {
    echo "<div class='alert alert-danger'>Erro ao realizar o cadastro!</div>";
}
