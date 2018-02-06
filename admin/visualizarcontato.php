<?php
// recuperando os dados do id

$id = $_GET["id"];

$sql = "select * from contato where id = " . (int) $id . " limit 1";
$consulta = $con->prepare($sql);
$consulta->execute();
?>
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
                            <th>Nome solicitante</th>
                            <th>Email</th>
                            </thead>
                            <?php
                            //sql para selecionar as plataformas
                            $sql = "select * from contato where id = ".(int)$id;
                            $consulta = $con->prepare($sql);
                            $consulta->bindParam(1, $id);
                            $consulta->execute();
                            //gerar os dados na tela
                            while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                                //separar os dados
                                $nome = $dados->nome;
                                $email = $dados->email;
                                $assunto = $dados->assunto;
                                $mensagem = $dados->mensagem;
                                //mostrar os dados na linha da tabela
                                echo "<tr>
				<td>$nome</td>
				<td>$email</td>
			</tr>
			<tr>
			<td><span style='font-weight: bold;'>Mensagem:</span> $mensagem</td>
                </tr>
			 <tfoot>
                            <td>
                                <a
                                        href='javascript:excluir($id)'
                                        class='btn btn-danger'>
                                    <i class='glyphicon glyphicon-trash'></i> Excluir
                                </a>
                            </td>
                            </tfoot>";
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
			location.href =	"home.php?pg=excluircontato&id="+id;
		}
	}
</script>