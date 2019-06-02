<?php
	$id = $aluno_id = $materia_id = $foto = $descricao =  "";
	//aqui vai pegar o parametro que vai vim por get para poder saber se esta editando
	//essa parte aqui muda em relacao ao que usamos na faculdade para pegar o id que vem por get na barra de pesquisa
	if ( isset ($parametro[1] ) ) {
	    //recuperar o id
	    $id = trim( $parametro[1] );
	    //selecionar os dados do banco
	    $sql = "select * from atividade where id = ? limit 1";
	    //prepare
	    $consulta = $pdo->prepare( $sql );
	    //passar um parametro
	    $consulta->bindParam( 1, $id );
	    //executa
	    $consulta->execute();
	    //separar os dados
	    $dados = $consulta->fetch(PDO::FETCH_OBJ);
	    $id 		= $dados->id;
		$foto 		= $dados->foto;
		$descricao  = $dados->descricao;
		$aluno_id   = $dados->aluno_id;
		$materia_id = $dados->$materia_id;
	}
?>
    
	<div class="row top">
		<div class="col-md-6 col-sm-6 mx-auto">
			<div class="card card-body">
				<h3 class="text-center login100-form-title mb-4">Enviar Atividade</h3>
				<div class="alert alert-danger">
					<a class="close font-weight-light" data-dismiss="alert" href="#">×</a>todos os Campos são Obrigatorios
				</div>

				<form class="validate-form" name="formEnvio" method="post" action="salvarAtividade" novalidate>

					<fieldset>
				

						<div class="form-group col-md-6 mb-3 " id="idAt">
							<label for="id">ID Atividade:</label>
							<div class="controls ">
								<input type="text" name="id" class="form-control input100" id="id" readonly value="<?=$id;?>">
									
							</div>
						</div>

						<div class="form-group col-md-6 mb-3 " id="idAlu">
							<label for="id">ID Aluno:</label>
							<div class="controls validate-input" data-validate = "Informe o id aluno">
								<input required type="text" name="aluno_id" class="form-control input100" id="aluno_id" readonly value="<?php echo $_SESSION["aluno"]["id"];?>">
								<span class="focus-input100"></span>
							</div>
						</div>
						<br>


						<div class="form-group col-md-12" id="desc">
							<label for="descricao">Descrição:</label>
							<div class="controls wrap-input100 validate-input" data-validate = "Informe a descricao">
								<textarea rows="8" class="form-control input-lg input100" placeholder="Descrição da Atividade" name="descricao" value="<?=$descricao;?>" type="text"></textarea>
								<span class="focus-input100"></span>
							</div>
						</div>

						<div class="form-group col-md-12">
							<label for="materia_id">Selecione a Materia:</label>
							<div class="controls validate-input wrap-input100"  data-validate = "Selecione a materia">
								<select name="materia_id" class="form-control input100" required id="materia_id">
									<option value="">
										Selecione uma Materia
									</option>
											<?php
											//selecionar as materiass
											$sql = "select * from materia where ativo = 's' order by nome";
											//preparar o sql e executar
											$consulta = $pdo->prepare($sql);
											$consulta->execute();
											while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
												$id = $dados->id;
												$nome = $dados->nome;
												echo "<option value='$id'>$nome</option>";
											}
											?>
										</select>
										<span class="focus-input100"></span>
										<script type="text/javascript">
											$("#materia_id").val('<?=$materia_id;?>');
										</script>
							</div>
						</div>
						<!--trocar por um botao pra add a foto depois so pra testes-->
						<div class="form-group col-md-12 mb-3 ">
							<label for="foto">foto:</label>
							<div class="controls validate-input wrap-input100"  data-validate = "Informe a foto">
								<input required type="text" name="foto" placeholder="foto" class="form-control input100" id="foto" value="<?=$foto;?>">
								<span class="focus-input100"></span>
							</div>
						</div>
					
							
							
						<input class="btn-primary  btn btn-lg enviar" value="Enviar" type="submit">
					</fieldset>
				</form>
            </div>
        </div>
    </div>
