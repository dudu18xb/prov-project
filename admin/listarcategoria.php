<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Visualizar Categoria
        <small>Painel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active" href="home.php?pg=listarcategoria">Visualizar de Categoria</li>
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
                        <h3 class="box-title">Formulário de Cadastro</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                            <th>ID</th>
                            <th>Nome da Categoria</th>
                            <th width="25%" style="text-align: center;">Opções</th>
                            </thead>
                            <?php
                            //sql para selecionar as plataformas
                            $sql = "select * from categoria
		order by nome";
                            $consulta = $con->prepare($sql);
                            //executo o sql
                            $consulta->execute();
                            //gerar os dados na tela
                            while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                                //separar os dados
                                $id = $dados->id;
                                $nome = $dados->nome;
                                //mostrar os dados na linha da tabela
                                echo "<tr>
				<td>$id</td>
				<td>$nome</td>
				<td>
					<a 
					href='javascript:excluir($id)'
					class='btn btn-danger'>
						<i class='glyphicon glyphicon-trash'></i> Excluir
					</a>

					<a href='home.php?pg=categoria&id=$id'
					class='btn btn-primary'>
						<i class='glyphicon glyphicon-pencil'></i> Alterar
					</a>
				</td>
			</tr>";
                            }
                            ?>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
</section>

<script type="text/javascript">
	function excluir(id) {
		if (confirm("Deseja mesmo excluir este registro?")) {
			//direcionar para a pagina de exclusão de dados
			location.href =	"home.php?pg=excluircategoria&id="+id;
		}
	}
</script>