<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Visualizar Banner
        <small>Site</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active" href="home.php?pg=listarbanner">Visualziar Banner</li>
    </ol>
</section>



<!-- Main content -->
<section class="content">
    <form name="form1" method="post" novalidate action="home.php?pg=salvarbanner" enctype="multipart/form-data">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Banners Cadastrados</h3>
                    </div>
                        <div class="box-body">
                            <table class="table table-bordered">
                                <thead>
                                <th style="text-align: center;" width="2%">ID</th>
                                <th style="text-align: center;" width="10%">Foto</th>
                                <th style="text-align: center;" width="8%">Titulo</th>
                                <th style="text-align: center;" width="50%">Texto</th>
                                <th width="19%" style="text-align: center;">Opções</th>
                                </thead>

                                <?php
                                //listagem de banners
                                $sql = " select * from banner order by foto desc";
                                $consulta = $con->prepare($sql);
                                $consulta->execute();
                                while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {

                                    //recuperar os dados
                                    $id = $dados->id;
                                    $titulo = $dados->titulo;
                                    $texto = $dados->texto;
                                    $foto = $dados->foto;

                                    // 123456 -> ../images/123456p.jpg
                                    $foto = "../images/banner/" . $foto . "g.jpg";

                                    echo "<tr>
				<td>$id</td>
				<td>
                                    <img src='$foto' width='100%'>
                                </td>
				<td>$titulo</td>
				<td style='text-align: justify;'>$texto</td>
				<td>
					<a
					href='javascript:excluir($id)'
					class='btn btn-danger'>
						<i class='glyphicon glyphicon-trash'></i> Excluir
					</a>

					<a href='home.php?pg=banner&id=$id'
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
                                <td>920 X 350</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </form>
</section>
<script type="text/javascript">
    function excluir(id) {
        if (confirm("Deseja mesmo excluir este registro?")) {
            //direcionar para a pagina de exclusão de dados
            location.href = "home.php?pg=excluirbanner&id=" + id;
        }
    }
</script>
