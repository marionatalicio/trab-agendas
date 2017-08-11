<?php
    require 'controlador_agenda.php';

    if (isset($_GET['nome']) and !empty($_GET['nome'])) {
    	$meusContatos = buscarContato($_GET['nome']);
    } else{
    	$meusContatos = pegarContatos();
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agenda</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

	
	<div class="container" style="margin-top: 30px;">

		<h3>MINHA AGENDA DE CONTATOS</h3>
		<br />
		
		<!-- CADASTRO-->
		<div class="row">
			<div class="col-md-12">
				<form class="form-inline" action="controlador_agenda.php?acao=cadastrar" method="post" >

				  <!--nome-->
				  <div class="form-group">
				    <label for="nome">Nome</label>
				    <input type="text" class="form-control" id="nome" name="nome">
				  </div>
				  
				  <!--email-->
				  <div class="form-group">
				    <label for="email">Email</label>
				    <input type="email" class="form-control" id="email" name="email">
				  </div>

				  <!--telefone-->
				  <div class="form-group">
				    <label for="telefone">Telefone</label>
				    <input type="text" class="form-control" id="telefone" name="telefone">
				  </div>

				  <button type="submit" class="btn btn-default">CADASTRAR</button>

				</form>
			</div>
		</div>

        <form class="form-inline" action="" method="get" >

            <div class="form-group text align right">
                <label for="nome">Buscar</label>
                <input type="text" class="form-control" id="nome" name="nome">
            </div>

            <button type="submit" class="btn btn-default">BUSCAR</button>
        </form>

		<br />
		
		<!--CONTATOS-->
		<div class="row">
			<div class="col-md-12">

				<!-- Conteúdo -->
				<table class="table"> 
					<thead> 
						<tr> 
							<th>#</th> 
							<th>Nome</th> 
							<th>Email</th> 
							<th>Telefone</th> 
                            <th>Ações</th>
						</tr> 
					</thead> 
					<tbody> 
						<!-- repetir -->
						<?php foreach($meusContatos as $contato): ?>
                        <tr>
							<th scope="row"><?= $contato['id']?></th>
							<td><?= $contato['nome']?></td>
							<td><?= $contato['email']?></td>
                            <td><?= $contato['telefone']?></td>
						    <td><a href="controlador_agenda.php?acao=excluir&id=<?= $contato['id'] ?>">excluir</a></td>
                            <td><a href="formulario_editar_contato.php?id=<?= $contato['id'] ?>">editar</a></td>
                        </tr>
                        <?php endforeach;?>
					</tbody> 
				</table>
			</div>
		</div>
	</div>
</body>
</html>