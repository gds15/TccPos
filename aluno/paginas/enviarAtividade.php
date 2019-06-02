


<div class="container py-1">
    <div class="row">
        <div class="mx-auto col-sm-12">        
            <div class="card">

                <span class="login100-form-title p-b-51">
					Envio de Atividade
				</span>

                <div class="card-body">
					<div class="formatv">
	                <form name="formcadastro" method="post" action="salvarAtividade" novalidate>

						<fieldset>
							
								
								<label for="ida" class="labelForm">ID da Atividade:</label>
								<div class="wrap-input100 validate-input m-b-16 col-sm-5">
									<input readonly class="input100" type="text" name="id" placeholder="ID Atividade">
									<span class="focus-input100"></span>
								</div>
							

								<label for="idaluno" class="labelForm">ID do Aluno:</label>
								<div class="wrap-input100 validate-input m-b-16 col-sm-5">
									<input readonly class="input100" type="text" name="aluno_id" placeholder="ID Aluno" value="<?php echo $_SESSION["aluno"]["id"];?>">
									<span class="focus-input100"></span>
								</div>
								
								<label for="descricao" class="labelForm">Descrição da Atividade:</label>
								<div class="wrap-input100 validate-input m-b-16" data-validate = "Informe a Descrição">
									<textarea class="input100 inputArea" name="descricao" placeholder="Descrição"></textarea>
									<span class="focus-input100"></span>
								</div>


									 <label for="descricao" class="labelForm">Selecione a Materia:</label>
									<div class="wrap-input100 validate-input m-b-16">
											<select name="materia_id"
											class="wrap-input100 validate-input m-b-16 input100"
											required id="responsavel"
											data-validation="Selecione o Responsavel">
												<option value="<?=$materia_id;?>"> </option>
												<?php
												//selecionar todas as classes
												$sql = "select * from materia
													order by nome";
												//preparar o sql
												$consulta = $pdo->prepare($sql);
												//executar o sql
												$consulta->execute();
												//laço para pegar registro por registro
												while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
													//separar os dados
													$id = $dados->id;
													$nome = $dados->nome;
													echo "<option value='$id'>
													$nome</option>";
												}
												?>
											</select>
											<script type="text/javascript">
												$("#materia_id").val('<?=$materia_id;?>');
											</script>
										</div>
									    </div>

									<label for="foto" class="labelForm">foto:</label>
									<div class="wrap-input100 validate-input m-b-16 ">
										<input  class="input100" type="text" name="foto" placeholder="foto" >
										<span class="focus-input100"></span>
									</div>




							


			                <div class="container-contact100-form-btn">
								<button class="contact100-form-btn">
									<span>
										<i class="fa fa-paper-plane-o m-r-6" aria-hidden="true"></i>
										Enviar!
									</span>
								</button>
							</div>
							</div>

						</fieldset>

					</form>
            	</div>
        	</div>
    	</div>
	</div>
</div>