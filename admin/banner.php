<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        General Form Elements
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Quick Example</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                   placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" id="exampleInputFile">

                            <p class="help-block">Example block-level help text here.</p>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Check me out
                            </label>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>


<h1>Cadastro do Banner</h1>

<div class="pull-right">
    <a href="home.php?pg=banner"
       class="btn btn-primary"
       title="Novo Cadastro">
        Novo Cadastro de Banner
    </a>

    <a href="home.php?pg=listarbanner"
       class="btn btn-success" title="Visualizar">
        Visualizar Banners Cadastrados
    </a>
</div>

<div class="clearfix"></div>

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
<form name="form1" method="post" novalidate action="home.php?pg=salvarbanner" enctype="multipart/form-data">
    <fieldset>
        <legend>* Campo obrigatório</legend>

        <input type="hidden" name="id"
               class="form-control" value="<?= $id; ?>" readonly>

        <div class="row">
            <div class="col-lg-6">
                <label for="titulo" class="control-label">* Titulo:</label>
                <section class="panel">
                    <div class="panel-body">
                        <input type="text" required
                               name="titulo"
                               class="form-control" value="<?= $titulo; ?>"
                               data-validation-required-message="Preencha O titulo"
                               placeholder="Insere o Titulo do Banner, Max de Caracteres: 50 caracteres">
                    </div>
                </section>
            </div>
            <div class="col-lg-6">
                <label for="texto" class="control-label">* Texto:</label>
                <section class="panel">
                    <div class="panel-body">
                        <input type="text" required
                               name="texto"
                               class="form-control" value="<?= $texto; ?>"
                               data-validation-required-message="Preencha o Texto"
                               placeholder="Insere o Texto do Banner, Max de Caracteres: 150 caracteres">
                    </div>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <label for="control-label">
                    Foto/Imagem:
                </label>
                <section class="panel">
                    <div class="panel-body">
                        <input type="file" name="foto" class="form-control" value="<?= $foto; ?>">
                        (Selecione um arquivo JPG)
                    </div>
                </section>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Salvar Dados</button>
    </fieldset>
</form>
