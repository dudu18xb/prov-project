<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Cadastro de Banner
        <small>Site</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active" href="home.php?pg=banner">Cadastro de Banner</li>
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
            <input type="hidden" name="id"
                   class="form-control" readonly
                   value="<?= $id; ?>">
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
                                <label for="exampleInputEmail1">Titulo</label>
                                <input type="text" required
                                       name="titulo"
                                       class="form-control" value="<?= $titulo; ?>"
                                       data-validation-required-message="Preencha O titulo"
                                       placeholder="Insere o Titulo do Banner, Max de Caracteres: 50 caracteres">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Texto</label>
                                <input type="text" required
                                       name="texto"
                                       class="form-control" value="<?= $texto; ?>"
                                       data-validation-required-message="Preencha o Texto"
                                       placeholder="Insere o Texto do Banner, Max de Caracteres: 150 caracteres">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Seleciona o Arquivo</label>
                                <input type="file" name="foto" class="form-control" value="<?= $foto; ?>">
                                (Selecione um arquivo JPG)
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Tamanho</th>
                            </tr>
                            <tr>
                                <td>920 X 613</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </form>
</section>