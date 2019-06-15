<?php
    $id = $descricao = $professor_id = $materia_id = $turma_id = $dataEntrega =  "";
    $dataEntrega = date("d-m-Y");
	//aqui vai pegar o parametro que vai vim por get para poder saber se esta editando
	//essa parte aqui muda em relacao ao que usamos na faculdade para pegar o id que vem por get na barra de pesquisa
	if ( isset ($parametro[1] ) ) {
	    //recuperar o id
	    $id = trim( $parametro[1] );
	    //selecionar os dados do banco
	    $sql = "select * from atividadesafazer where id = ? limit 1";
	    //prepare
	    $consulta = $pdo->prepare( $sql );
	    //passar um parametro
	    $consulta->bindParam( 1, $id );
	    //executa
	    $consulta->execute();
	    //separar os dados
	    $dados = $consulta->fetch(PDO::FETCH_OBJ);
	    $id 		   = $dados->id;
		$descricao	   = $dados->descricao;
		$professor_id  = $dados->professor_id;
		$materia_id    = $dados->materia_id;
        $turma_id      = $dados->turma_id;
        $dataEntrega   = $dados->dataEntrega;
	}
?>
    
	<div class="row top">
		<div class="col-md-6 col-sm-6 mx-auto">
			<div class="card card-body">
				<h3 class="text-center login100-form-title mb-4">Enviar Atividade a Turma</h3>
				<div class="alert alert-danger">
					<a class="close font-weight-light" data-dismiss="alert" href="#">×</a>todos os Campos são Obrigatorios
				</div>

				<form class="validate-form" name="formEnvio" method="post" action="salvarAtividadeAfazer" enctype="multipart/form-data" novalidate>

					<fieldset>
				

						<div class="form-group col-md-6 mb-3 " id="idAt">
							<label for="id">ID Atividade:</label>
							<div class="controls ">
								<input type="text" name="id" class="form-control input100" id="id" readonly value="<?=$id;?>">
									
							</div>
						</div>

						<div class="form-group col-md-6 mb-3 " id="idAlu">
							<label for="id">ID Professor:</label>
							<div class="controls validate-input" data-validate = "Informe o id aluno">
								<input required type="text" name="professor_id" class="form-control input100" id="professor_id" readonly value="<?php echo $_SESSION["prof"]["id"];?>">
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

                        <div class="form-group col-md-12 ">
							<label for="id">Data Entrega:</label>
							<div class="controls wrap-input100 validate-input" data-validate = "Informe a data para a entrega">
								<input required type="text" name="dataEntrega" class="form-control input100" id="dataEntrega" data-mask="99-99-9999"  value="<?=$dataEntrega;?>">
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

                        <div class="form-group col-md-12">
							<label for="materia_id">Selecione a Turma:</label>
							<div class="controls validate-input wrap-input100"  data-validate = "Selecione a turma">
								<select name="turma_id" class="form-control input100" required id="turma_id">
									<option value="">
										Selecione uma turma
									</option>
											<?php
											//selecionar as materiass
											$sql = "select * from turma where ativo = 's' order by nome";
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
											$("#turma_id").val('<?=$turma_id;?>');
										</script>
							</div>
						</div>      

                                     

						
					
							
							
						<input class="btn-primary  btn btn-lg enviar" value="Enviar" type="submit">
					</fieldset>
				</form>
            </div>
        </div>
    </div>
