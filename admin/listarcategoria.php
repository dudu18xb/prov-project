<h1>Lista de Categorias</h1>

<div class="pull-right">
    <a href="home.php?pg=categoria"
       class="btn btn-primary" 
       title="Novo Cadastro">
        Novo Cadastro de Categoria
    </a>

    <a href="home.php?pg=listarcategoria"
       class="btn btn-success" title="Listar">
        Visualizar Categorias Cadastradas
    </a>
</div>

<div class="clearfix"></div>

<table class="table table-striped 
table-hover table-bordered">
	<thead>
		<th style="text-align: center;">ID</th>
		<th style="text-align: center;">Nome da Categoria</th>
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
</table>

<script type="text/javascript">
	function excluir(id) {
		if (confirm("Deseja mesmo excluir este registro?")) {
			//direcionar para a pagina de exclusão de dados
			location.href =	"home.php?pg=excluircategoria&id="+id;
		}
	}
</script>