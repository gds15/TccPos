<link rel="stylesheet" type="text/css" href="../../css/main.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>




<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				
				<div class="profile-userpic">
					<img src="../fotos/teste.jpg"  alt="">
                </div>
                <?php 

                    //esse aqui 
                    $x = $_SESSION["aluno"]["id"];

                    //n tem q ser a.id?
                    //como assim ?
                    //acho que não, pq esse id é esse x aqui de cima 
                    
                    //entendi agora, ta certo
                    //mano na tabela turma o nome da turma e "NOME"
                    //E DO ALUNO TMB 
                    //s
                    //N DA CONFLITO ?
                    //NA HORA DE LISTAR ?
                    //SIM
                    //vc ja testou?
                    //tenta assim
                    //e se mudar na tabela ?
                    //espera ae testa la
                    //ta
                    $sql = "SELECT a.*, t.nome as 'nomeTurma' FROM aluno a JOIN turma t ON t.id = a.turma_id WHERE a.id = $x";
                    $consulta = $pdo->prepare($sql);
                    $consulta->execute();

                    while ( $dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                    $id        = $dados->id;
                    $nome      = $dados->nome;
                    $login     = $dados->login;
                    $turma_id  = $dados->nomeTurma;


                   // $imagem = $imagem . "p.jpg";
                   // $img = "../fotos/$imagem";

                    
                    //teste ta vendo ai?
                    //sim 
                    //lol
                    //GG kkkkkkkkk
                    

                ?>
                
				
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Editar Perfil</button>
					
				</div>
				
				<div class="profile-usermenu">
					<ul class="nav">
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Nome: <?=$nome;?> </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Login: <?=$login;?> </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
                            Turma: <?=$turma_id;?> </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
                            Contatos
                        </a>
                        
                        </li>
                     
                    </ul>
                    <?php } ?>
                    <div class="contato">
                            <a class="btn btn-primary btn-twitter btn-sm" href="https://twitter.com/vinivve">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" rel="publisher"
                            href="https://plus.google.com/+ahmshahnuralam">
                                <i class="fa fa-google-plus"></i>
                            </a>
                            <a class="btn btn-primary btn-sm" rel="publisher"
                            href="https://www.facebook.com/vinicius.valencioelias">
                                <i class="fa fa-facebook"></i>
                            </a>
                            
                        </div>
                    
                </div>
                

		
			</div>
		</div>
	</div>
</div>

<br>
<br>