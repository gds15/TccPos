<?php
	if ( $_POST ) {
				//print_r( $_POST );
				$id       	= trim( $_POST["id"] );
				$descricao = trim($_POST["descricao"]);
				$aluno_id = trim($_POST["aluno_id"]);		
				$materia_id = trim($_POST["materia_id"]);
                $professor_id = trim($_POST["professor_id"]);
                $correcao     = trim($_POST["correcao"]);
                $nota         = trim($_POST["nota"]);
			
				//dar update no banco de dados
				$sql = "update atividade set  descricao = ?, aluno_id = ?, materia_id = ?, professor_id = ?, correcao = ?, nota = ?, ativo = 's' where id = ? limit 1";
				$consulta = $pdo->prepare($sql);
				$consulta->bindParam(1, $descricao);
				$consulta->bindParam(2, $aluno_id);
				$consulta->bindParam(3, $materia_id);
                $consulta->bindParam(4, $professor_id);
                $consulta->bindParam(5, $correcao);
                $consulta->bindParam(6, $nota);
                $consulta->bindParam(7, $id);
			//verificar se executou corretamente
			if ( $consulta->execute() ) {
				echo "<script>alert('Registro Editado');location.href='home';</script>";
			} else {
				//exit();
				echo "<script>alert('Erro ao Editar');history.back();</script>";

			}
		
	} else {
		//mensagem de erro ao acessar diretamente o arquivo
		echo "<div class='alert alert-danger container'>
		ERRO: tentativa inválida</div>";
	}