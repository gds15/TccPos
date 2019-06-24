<?php
	if ( $_POST ) {

		$nomef = "";		
			if ( ! empty ($_FILES["imagem"]["name"] ) ) {

				$tipo = $_FILES["imagem"]["type"];
				$tamanho = $_FILES["imagem"]["size"];

					// bytes em kbytes
				$tamanho = $tamanho / 1024;

					//formatar o tamanho 11111111
				$tamanho = number_format( 
					$tamanho, 
					3, 
					".", 
					"" 
				);
				//1111111111
				//verificar se é um arquivo JPG
					if ( $tipo != "image/jpeg" ) {
						echo "<script>alert('Você pode enviar somente arquivos JPG. Formato enviado $tipo.');history.back();</script>";
						exit();
					} else if ( $tamanho > 1024 ) {

						echo "<script>alert('Envie imagens de até 1 MB. Tamanho da imagem atual $tamanho Kb');history.back();</script>";
					} else if ( !copy( 
						$_FILES["imagem"]["tmp_name"], 
						"../fotos/" . $_FILES["imagem"]["name"] ) ) {

						echo "<script>alert('Erro ao copiar arquivo');history.back();</script>";
					} else {

							//incluir o arquivo com a funcao
						include "../configuracoes/imagem.php";
						
						$pastaFotos = "../fotos/";
						$imagem = $pastaFotos . $_FILES["imagem"]["name"];
						$nomef = time();

						LoadImg($imagem,$nomef,$pastaFotos);

					}
				} else if ( !empty ( $_POST["imagem"] ) ){

					$nomef = trim ( $_POST["imagem"] );

				} 

				print_r( $_POST );
				$id       	= trim( $_POST["id"] );
				$descricao = trim($_POST["descricao"]);
				$aluno_id = trim($_POST["aluno_id"]);		
				$materia_id = trim($_POST["materia_id"]);
				$professor_id = trim($_POST["professor_id"]);
				$imagem = $nomef;
	
		
		
			//verificar se existe esta conta cadastrada
			$sql = "select * from atividade
			where descricao = ? and aluno_id = ? and id <> ? limit 1";
			$consulta = $pdo->prepare($sql);
			$consulta->bindParam(1, $descricao);
			$consulta->bindParam(2, $aluno_id);
			$consulta->bindParam(3, $id);
			$consulta->execute();
			$dados = $consulta->fetch(PDO::FETCH_OBJ);
			if ( !empty( $dados->id ) ) {
				//já existe um registro cadastrado
				echo "<script>alert('esta atividade já esta cadastrada');history.back();</script>";
				exit;
			}
			
				//gravar no banco de dados
				$sql = "insert into atividade (id, imagem, descricao, aluno_id, materia_id, professor_id, ativo, turma_id)
				values (NULL, ? , ?, ?, ?, ?, 's', ?)";
				$consulta = $pdo->prepare($sql);
				//passar o parametro
				$consulta->bindParam(1, $imagem);
				$consulta->bindParam(2, $descricao);
				$consulta->bindParam(3, $aluno_id);
				$consulta->bindParam(4, $materia_id);
				$consulta->bindParam(5, $professor_id);
				$consulta->bindParam(6, $_SESSION["aluno"]["turma_id"]);
			//verificar se executou corretamente
			if ( $consulta->execute() ) {
				echo "<script>alert('Registro Salvo');location.href='atividade';</script>";
			} else {
				//exit();
				echo "<script>alert('Erro ao Salvar');history.back();</script>";

			}
		
	} else {
		//mensagem de erro ao acessar diretamente o arquivo
		echo "<div class='alert alert-danger container'>
		ERRO: tentativa inválida</div>";
	}