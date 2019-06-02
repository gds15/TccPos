<?php
	if ( $_POST ) {
		print_r( $_POST );
		$id            = trim( $_POST["id"] );
		$aluno_id = trim($_POST["aluno_id"]);
		$descricao = trim($_POST["descricao"]);
		$foto = trim($_POST["foto"]);
		$materia_id = trim($_POST["materia_id"]);
		
		
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
			//verificar se o id esta vazio - insert
			if ( empty ( $id ) ) {
				//gravar no banco de dados
				$sql = "insert into atividade (id, foto, descricao, aluno_id, materia_id, ativo)
				values (NULL, ? , ?, ?, ?, 's')";
				$consulta = $pdo->prepare($sql);
				//passar o parametro
				$consulta->bindParam(1, $foto);
				$consulta->bindParam(2, $descricao);
				$consulta->bindParam(3, $aluno_id);
				$consulta->bindParam(4, $materia_id);
				
			} else {
				//dar update
				$sql = "update atividade 
					set foto = ?, descricao = ?, aluno_id = ?, materia_id = ?,  ativo = 's' where id = ? limit 1";
				$consulta = $pdo->prepare( $sql );
				$consulta->bindParam(1, $foto);
				$consulta->bindParam(2, $descricao);
				$consulta->bindParam(3, $aluno_id);
				$consulta->bindParam(4, $materia_id);
				$consulta->bindParam(5, $id );
			}
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