<?php
	//iniciar a sessao
	session_start();
	
	//verificar se os dados foram POST
	if ( $_POST ) {
		
		//conectar no banco de dados
		include "../configuracoes/conectar.php";
		//duas variaveis
		$login = $senha = "";
		//verificacao
		if ( isset( $_POST["login"] ) ) {
			$login = trim( $_POST["login"] );
		}
		if ( isset( $_POST["senha"] ) ) {
			$senha = trim( $_POST["senha"] );
		}
		//verificar se os campos estao preenchidos
		if ( empty( $login ) ) {
			//mostrar uma mensagem e retornar a tela anterior
			echo "<script>alert('Preencha o login');history.back();</script>";
		}
		else if ( empty( $senha ) ) {
			echo "<script>alert('Preencha a senha');history.back();</script>";
		}
		else {
			
			//buscar o usuario com o login
			$sql = "select * from aluno
			where login = ? and ativo = 1
			limit 1";
			//preparar consulta para ser executado
			$consulta = $pdo->prepare($sql);
			//passar parametro
			$consulta->bindParam(1,$login);
			//executar o comando
			$consulta->execute();
			$dados = $consulta->fetch(PDO::FETCH_OBJ);
			
			//criptografar a senha
			$senha = md5($senha);
			//verificar se trouxe algo
			if ( empty ($dados->id) ) {
				//nao trouxe nenhum usuario
				echo "<script>alert('Usuário ou senha incorreta');history.back();</script>";
			}
			else if ( $senha != $dados->senha ) {
				//senha incorreta
				echo "<script>alert('Usuário ou senha incorreta');history.back();</script>";
			}
			else {
				//esta tudo ok
				//gravar dados dentro da sessao
				$_SESSION["aluno"] = array(
					"id" => $dados->id,
					"login" => $dados->login
					
					);
				//redirecionar
				header("Location: home.php");
			}
		}
	} else {
		//enviar a página para o index.php
		header("Location: index.php");
	}