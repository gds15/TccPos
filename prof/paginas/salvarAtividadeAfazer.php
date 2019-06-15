<?php
	if ( $_POST ) {

		//print_r( $_POST );
		$id       	  = trim( $_POST["id"] );
		$professor_id = trim($_POST["professor_id"]);
		$descricao    = trim($_POST["descricao"]);
		$materia_id   = trim($_POST["materia_id"]);
        $turma_id     = trim($_POST["turma_id"]);
        $dataEntrega  = trim($_POST["dataEntrega"]);

        $dataEntrega  = formatardata( $dataEntrega );
	
		
		
			//verificar se existe esta atividade ja esta cadastrada
			$sql = "select * from atividadesafazer
			where descricao = ? and professor_id = ? and id <> ? limit 1";
			$consulta = $pdo->prepare($sql);
			$consulta->bindParam(1, $descricao);
			$consulta->bindParam(2, $professor_id);
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
				$sql = "insert into atividadesafazer (id, professor_id, descricao, turma_id, materia_id, dataEntrega, ativo)
				values (NULL, ? , ?, ?, ?, ?, 's')";
				$consulta = $pdo->prepare($sql);
				//passar o parametro
				$consulta->bindParam(1, $professor_id);
				$consulta->bindParam(2, $descricao);
				$consulta->bindParam(3, $turma_id);
                $consulta->bindParam(4, $materia_id);
                $consulta->bindParam(5, $dataEntrega);
				
			} else {
				//dar update
				$sql = "update atividadesafazer 
					set professor_id = ?, descricao = ?, turma_id = ?, materia_id = ?, dataEntrega =?,  ativo = 's' where id = ? limit 1";
				$consulta = $pdo->prepare( $sql );
				$consulta->bindParam(1, $professor_id);
				$consulta->bindParam(2, $descricao);
				$consulta->bindParam(3, $turma_id);
                $consulta->bindParam(4, $materia_id);
                $consulta->bindParam(5, $dataEntrega);
				$consulta->bindParam(6, $id );
			}
			//verificar se executou corretamente
			if ( $consulta->execute() ) {
				echo "<script>alert('Registro Salvo');location.href='home';</script>";
			} else {
				//exit();
				echo "<script>alert('Erro ao Salvar');history.back();</script>";

			}
		
	} else {
		//mensagem de erro ao acessar diretamente o arquivo
		echo "<div class='alert alert-danger container'>
		ERRO: tentativa inválida</div>";
	}