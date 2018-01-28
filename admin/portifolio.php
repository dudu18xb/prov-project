<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Cadastro de Portifólio
        <small>Site</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active" href="home.php?pg=portifolio">Cadastro de Portifólio</li>
    </ol>
</section>



<?php
//edição dos dados
$id = $id_categoria = $nome = $url = $foto = "";
//verifica se foi enviado id por get
if (isset($_GET["id"])) {
    $id = trim($_GET["id"]);
    //sql para selecionar a categoria
    $sql = "select * from portifolio where id = ? limit 1";
    $consulta = $con->prepare($sql);
    $consulta->bindParam(1, $id);
    $consulta->execute();
    $dados = $consulta->fetch(PDO::FETCH_OBJ);
    //separar os dados
    $id = $dados->id;
    $id_categoria = $dados->id_categoria;
    $nome = $dados->nome;
    $url = $dados->url;
    $foto = $dados->foto;
}
?>
<!-- Main content -->
<section class="content">
    <form name="form1" method="post" novalidate action="home.php?pg=salvarportifolio" enctype="multipart/form-data">
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
                                <label for="exampleInputEmail1">Seleciona a Categoria</label>
                                <select name="id_categoria" required
                                        data-validation-required-message="Selecione o a categoria"
                                        class="form-control"
                                        id="id_categoria">
                                    <option selected="selected"></option>
                                    <?php
                                    $sql = "select * from categoria order by nome";
                                    $consulta = $con->prepare($sql);
                                    $consulta->execute();
                                    while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                                        $id_categoria = $dados->id;
                                        $nome_categoria = $dados->nome;

                                        echo "<option value='$id_categoria'>$nome_categoria</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <script type="text/javascript">
                                $("#id_categoria").val(<?= $id_categoria; ?>);
                            </script>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome</label>
                                <input type="text" required
                                       name="nome"
                                       class="form-control" value="<?= $nome; ?>"
                                       data-validation-required-message="Preencha O titulo"
                                       placeholder="Insere o Nome como Titulo do portifólio">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">URL</label>
                                <input type="text" required
                                       name="url"
                                       class="form-control" value="<?= $url; ?>"
                                       data-validation-required-message="Preencha a URL"
                                       placeholder="Preenche a URL da Pagina">
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
                                <td>650 X 350</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </form>
</section>