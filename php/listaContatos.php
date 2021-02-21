<?php
	include "valida_cookies.inc";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Lista de Contatos</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/listacontatos.css">
	<link rel="stylesheet"
        href="https://fonts.googleapis.com/icon?family=Material+Icons" />
</head>
	<body>
	<div class="container">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top"> 
            <!-- logotipo / brand -->
            <a href="listaContatos.php" class="navbar-brand logotipo">
                <img src="../img/contact.png" alt="Logotipo do Lista Pra Fazer" />
            </a>

            <!-- botão que aparece quando a tela for pequena -->
            <button class="navbar-toggler" type="button"
                data-toggle="collapse" data-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <div class="btn-group">
                    <button type="button" data-toggle="dropdown"
                        class="btn btn-secondary dropdown-toggle"
                        aria-haspopup="true" aria-expanded="false">
                        Minha conta
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" type="button">
							<?php echo $_COOKIE["nome_usuario"];?>
                        </button>
                        <a class="dropdown-item" href="logout.php">
                            Sair
						</a>
                    </div>
                </div>
            </div>
        </nav>
	
		
		<div class="container">
		<div class="row cabecalho">
			<div class="col-xs-12 col-md-6">
				<h1>Lista de Contatos</h1>
			</div>
		</div>
		
		<div class="table-responsive">
			<table class="dados-list table table-striped table-bordered table-hover" >
				<thead>
				  <tr>
					<th>CPF</th>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Estado</th>
					<th>Cidade</th>
					<th>CEP</th>
					<th>Número da Residencia</th>
					<th>Número de Telefone</th>
					<th>Ações</th>
				  </tr>
				</thead>
				<tbody >
					<?php
						include "listarContatos.php";
					?>
				</tbody>
			</table>

			<footer class="row">
				<div class="col-sm-6">
					<button class="btn btn-primary" data-toggle="modal" data-target="#novoContato">
						Novo Contato</button>
				</div>
			</footer>
		</div>

		<div class="modal fade" id="novoContato">
		<div class="modal-dialog">
		  <div class="modal-content">
		  <div class="modal-header">
			  <h5 class="modal-title">Novo Contato</h5>
			  <button type="button" class="close" data-dismiss="modal" 
			  aria-label="Fechar">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<form action="salvarContato.php" method="post">

			<div class="row">
				<div class="form-group col-sm-6 col-xs-12">
					<label for="cpf_contato">CPF</label>
					<input type="text" name="cpf_contato" id="cpf_contato" class="form-control cpf" required="required" />
				</div>
			</div>
				<div class="modal-body">
					<div class="row">
                        <div class="form-group col-sm-6 col-12">
							<label for="nome_contato">Nome</label>
							<input type="text" name="nome_contato" id="nome_contato"
								class="form-control" required />
						</div>
					</div>

					<div class="row">
						<div class="form-group col-sm-6 col-12">
							<label for="email">E-mail</label>
							<input type="text" name="email" id="email"
								class="form-control" required />
						</div>
					</div>
					
					<div class="row">
						<div class="form-group col-sm-6 col-12">
							<label class="control-label" for="status">Estado</label>
							<select id="estado" name="estado" class="form-control">
								<option value="">Selecione...</option>
								<option value="AC">AC</option>
								<option value="AL">AL</option>
								<option value="AP">AP</option>
								<option value="AM">AM</option>
								<option value="BA">BA</option>
								<option value="CE">CE</option>
								<option value="DF">DF</option>
								<option value="ES">ES</option>
								<option value="GO">GO</option>
								<option value="MA">MA</option>
								<option value="MT">MT</option>
								<option value="MS">MS</option>
								<option value="MG">MG</option>
								<option value="PA">PA</option>
								<option value="PB">PB</option>
								<option value="PR">PR</option>
								<option value="PE">PE</option>
								<option value="PI">PI</option>
								<option value="RJ">RJ</option>
								<option value="RN">RN</option>
								<option value="RS">RS</option>
								<option value="RO">RO</option>
								<option value="RR">RR</option>
								<option value="SC">SC</option>
								<option value="SP">SP</option>
								<option value="SE">SE</option>
								<option value="TO">TO</option>

							</select>
						</div>

						<div class="row">
							<div class="form-group col-sm-6 col-12">
								<label for="cidade">Cidade</label>
								<input type="text" name="cidade" id="cidade" class="form-control cep" required />
							</div>
						</div>

						<div class="row">
							<div class="form-group col-sm-6 col-12">
								<label for="cep">CEP</label>
								<input type="text" name="cep" id="cep"
									class="form-control" required />
							</div>
						</div>

						<div class="row">
							<div class="form-group col-sm-6 col-12">
								<label for="numero_residencial">Número da Residencia</label>
								<input type="text" name="numero_residencial" id="numero_residencial"
									class="form-control" required />
							</div>
						</div>

						
						<div class="row">
							<div class="form-group col-sm-6 col-12">
								<label for="numero_telefone">Número de Telefone</label>
								<input type="text" name="numero_telefone" id="numero_telefone"
									class="form-control" required />
							</div>
						</div>
					</div>
				</div>
				<input type="hidden" value="0" id="modo" name="modo"/>
				<div class="modal-footer">
					<button type="reset" class="btn btn-danger">Limpar</button>
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</form>
		  </div>
		</div>
	</div> 

	<script src='../js/jquery-3.3.1.min.js' type='text/javascript'></script>
	<script src='../js/popper.min.js'></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/listacontatos.js"></script>
	</body>
</html>