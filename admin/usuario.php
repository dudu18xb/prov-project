<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Cadastro de Usuário
        <small>Painel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active" href="home.php?pg=usuario">Cadastro de Usuário</li>
    </ol>
</section>



<?php
//edição dos dados
$id = $titulo = $texto = $foto = "";
//verifica se foi enviado id por get
if (isset($_GET["id"])) {
    $id = trim($_GET["id"]);
    //sql para selecionar a categoria
    $sql = "select * from banner where id = ? limit 1";
    $consulta = $con->prepare($sql);
    $consulta->bindParam(1, $id);
    $consulta->execute();
    $dados = $consulta->fetch(PDO::FETCH_OBJ);
    //separar os dados
    $id = $dados->id;
    $titulo = $dados->titulo;
    $texto = $dados->texto;
    $foto = $dados->foto;
}
?>
<!-- Main content -->
<section class="content">
    <form name="form1" method="post" novalidate action="home.php?pg=salvarbanner" enctype="multipart/form-data">
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
                                <label for="exampleInputEmail1">Login</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome Completo</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Senha</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
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