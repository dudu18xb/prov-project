<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Cadastro de Categoria
        <small>Painel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active" href="home.php?pg=categoria">Cadastro de Categoria</li>
    </ol>
</section>



<?php
//edição dos dados
$id = $nome = "";
//verifica se foi enviado id por get
if (isset($_GET["id"])) {
    $id = trim($_GET["id"]);
    //sql para selecionar a categoria
    $sql = "select * from categoria
			where id = ? limit 1";
    $consulta = $con->prepare($sql);
    $consulta->bindParam(1, $id);
    $consulta->execute();
    $dados = $consulta->fetch(PDO::FETCH_OBJ);
    //separar os dados
    $id = $dados->id;
    $nome = $dados->nome;
}
?>
<!-- Main content -->
<section class="content">
    <form name="form1" method="post" novalidate action="home.php?pg=salvarcategoria" >
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Formulário de Cadastro</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome</label>
                                <input type="text" required
                                       name="nome"
                                       class="form-control" value="<?= $nome; ?>"
                                       data-validation-required-message="Preencha a Categoria" placeholder="Insere o Nome da Categoria">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </form>
</section>