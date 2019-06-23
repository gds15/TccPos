<?php
	if ( $_POST ) {

				print_r( $_POST );
				$id       	      = trim( $_POST["id"] );
				$nome             = trim($_POST["nome"]);
				$login            = trim($_POST["login"]);		
				$senha            = trim($_POST["senha"]);
				$senhaConfirmacao = trim($_POST["senhaConfirmacao"]);
	
		
		
			//verificar se existe esta conta cadastrada
			$sql = "select * from aluno
			where login = ? limit 1";
			$consulta = $pdo->prepare($sql);
			$consulta->bindParam(1, $login);
			$consulta->execute();
			$dados = $consulta->fetch(PDO::FETCH_OBJ);
			if ( !empty( $dados->login ) ) {
				//já existe esse login registrado
				echo "<script>alert('este login ja esta em uso!!!');history.back();</script>";
				exit;
            }

            
            if ($senha === $senhaConfirmacao) {
                $senhaFinal = md5($senha);
            } else {
                //senhas não são iguais
				echo "<script>alert('as senhas não são as mesmas!!!');history.back();</script>";
				exit;
           }


           if (empty($senhaFinal)){
                $sql = "update aluno set  login = ? where id = ? limit 1";
                $consulta = $pdo->prepare($sql);
                $consulta->bindParam(1, $login);
                $consulta->bindParam(2, $id);
                //verificar se executou corretamente
                if ( $consulta->execute() ) {
                    echo "<script>alert('Registro Editado');location.href='home';</script>";
                } else {
                    //exit();
                    echo "<script>alert('Erro ao Editar');history.back();</script>";

                }
           } else {
                $sql = "update aluno set  login = ?, senha = ? where id = ? limit 1";
                $consulta = $pdo->prepare($sql);
                $consulta->bindParam(1, $login);
                $consulta->bindParam(2, $senhaFinal);
                $consulta->bindParam(3, $id);
                //verificar se executou corretamente
                if ( $consulta->execute() ) {
                    echo "<script>alert('Registro Editado');location.href='home';</script>";
                } else {
                    //exit();
                    echo "<script>alert('Erro ao Editar');history.back();</script>";

                }
           }
            
			
		
	} else {
		//mensagem de erro ao acessar diretamente o arquivo
		echo "<div class='alert alert-danger container'>
		ERRO: tentativa inválida</div>";
	}