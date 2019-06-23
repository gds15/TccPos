<?php
	
	if ( isset ($parametro[1] ) ) {
	    //recuperar o id
	    $id = trim( $parametro[1] );
	    //selecionar os dados do banco
	    $sql = "select * FROM aluno where id = ?";
	    //prepare
	    $consulta = $pdo->prepare( $sql );
	    //passar um parametro
	    $consulta->bindParam( 1, $id );
	    //executa
	    $consulta->execute();
	    //separar os dados
	    $dados = $consulta->fetch(PDO::FETCH_OBJ);
	    $id    = $dados->id;	
		$nome  = $dados->nome;
        $login = $dados->login;
        $senha = $dados->senha;

?>
    
	<div class="row top">
		<div class="col-md-6 col-sm-6 mx-auto">
			<div class="card card-body">
				<h3 class="text-center login100-form-title mb-4">Edição de Perfil</h3>
				<div class="alert alert-danger">
					<a class="close font-weight-light" data-dismiss="alert" href="#">×</a>todos os Campos são Obrigatorios
				</div>

				<form class="validate-form" name="formEnvio" method="post" action="salvarPerfil" enctype="multipart/form-data" novalidate>

					<fieldset>
				

						<div class="form-group col-md-6 mb-3 " id="idAt">
							<label for="id">ID Aluno:</label>
							<div class="controls ">
								<input type="text" name="id" class="form-control input100" id="id" readonly value="<?=$id;?>">
									
							</div>
						</div>

						

						<div class="form-group col-md-12" id="pro">
							<label for="nome">Nome:</label>
							<div class="controls validate-input" data-validate = "Informe o Nome">
								<input required type="text" name="nome" class="form-control input100" id="nome" readonly value='<?=$nome;?>'>
								<span class="focus-input100"></span>
							</div>
						</div>

                        <div class="form-group col-md-12" id="pro">
							<label for="nome">Login:</label>
							<div class="controls validate-input" data-validate = "Informe o Login">
								<input required type="text" name="login" class="form-control input100" id="login" value='<?=$login;?>'>
								<span class="focus-input100"></span>
							</div>
						</div>

                        <div class="form-group col-md-12" id="pro">
							<label for="nome">Senha:</label>
							<div class="controls validate-input">
								<input required type="password" name="senha" class="form-control input100" id="senha" >
								<span class="focus-input100"></span>
							</div>
						</div>

                        <div class="form-group col-md-12" id="pro">
							<label for="nome">Confirmar Senha:</label>
							<div class="controls validate-input">
								<input required type="password" name="senhaConfirmacao" class="form-control input100" id="senhaConfirmacao" >
								<span class="focus-input100"></span>
							</div>
						</div>

						<input class="btn-primary  btn btn-lg enviar" value="Enviar" type="submit">
					</fieldset>
				</form>
            </div>
        </div>
    </div>

<?php
    } else {
        //mensagem de erro ao acessar diretamente o arquivo
		echo "<div class='alert alert-danger container'>
		ERRO: tentativa inválida</div>";
    }
?>
