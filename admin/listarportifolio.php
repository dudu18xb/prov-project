<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Visualizar Portifólio
        <small>Site</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active" href="home.php?pg=imagemportifolio">Visualziar Banner</li>
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
                    <h3 class="box-title">Portifólios Cadastrados</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                        <th>ID</th>
                        <th style="text-align: center;" width="10%">Foto</th>
                        <th>Categoria</th>
                        <th>Nome</th>
                        <th>url</th>
                        <th width="19%" style="text-align: center;">Opções</th>
                        </thead>

                        <?php
                        //listagem de banners
                        $sql = "
                        select
                        p.id,
                        c.nome categoria,
                        p.nome nome,
                        p.url url,
                        p.foto
                        from portifolio p
                        inner join categoria c on (p.id_categoria = c.id) 
                        order by p.id desc
                        ";
                        $consulta = $con->prepare($sql);
                        $consulta->execute();
                        while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {

                            //recuperar os dados
                            $id = $dados->id;
                            $id_categoria = $dados->categoria;
                            $nome = $dados->nome;
                            $url = $dados->url;
                            $foto = $dados->foto;

                            // 123456 -> ../images/123456p.jpg
                            $foto = "../images/thumbnails/" . $foto . "g.jpg";

                            echo "<tr>
				<td>$id</td>
				<td>
                                    <img src='$foto' width='100%'>
                                </td>
				<td>$nome</td>
				<td>$url</td>
				<td>$id_categoria</td>
				<td>
					<a
					href='javascript:excluir($id)'
					class='btn btn-danger'>
						<i class='glyphicon glyphicon-trash'></i> Excluir
					</a>

					<a href='home.php?pg=portifolio&id=$id'
					class='btn btn-primary'>
						<i class='glyphicon glyphicon-pencil'></i> Alterar
					</a>
				</td>
			</tr>";
                        }
                        ?>
                    </table>
                </div>

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
</section>
<script type="text/javascript">
    function excluir(id) {
        if (confirm("Deseja mesmo excluir este registro?")) {
            //direcionar para a pagina de exclusão de dados
            location.href = "home.php?pg=excluirportifolio&id=" + id;
        }
    }
</script>
