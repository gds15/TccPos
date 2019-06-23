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
                    
                    $pro = $_SESSION["prof"]["id"];
                    $sql = "SELECT * FROM professor WHERE id = $pro";
                    $consulta = $pdo->prepare($sql);
                    $consulta->execute();

                    while ( $dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                    $id        = $dados->id;
                    $nomep     = $dados->nomep;
                    $login     = $dados->login;
                    $contato   = $dados->contato;

                   // $imagem = $imagem . "p.jpg";
                   // $img = "../fotos/$imagem";
                ?>
                
				
				<div class="profile-userbuttons">
					<a type="button" href="editarPerfil/<?=$id;?>" class="btn btn-success btn-sm">Editar Perfil</a>
					
				</div>
				
				<div class="profile-usermenu">
					<ul class="nav">
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Nome: <?=$nomep;?> </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Login: <?=$login;?> </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
                            Contato: <?=$contato;?> </a>
						</li>
                     
                    </ul>
                    <?php } ?>
                    
                </div>
                

		
			</div>
		</div>
	</div>
</div>

<br>
<br>