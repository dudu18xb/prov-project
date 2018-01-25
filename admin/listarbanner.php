<h1>Visualizar Banners</h1>

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

<table class="table table-striped
       table-hover table-bordered">
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
    $foto = "../images/carrosel/" . $foto . "g.jpg";

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

<script type="text/javascript">
    function excluir(id) {
        if (confirm("Deseja mesmo excluir este registro?")) {
            //direcionar para a pagina de exclusão de dados
            location.href = "home.php?pg=excluirbanner&id=" + id;
        }
    }
</script>
