<?php
	//iniciar a sessao
	session_start();
	if ( !isset( $_SESSION["prof"]["id"] ) ) {
		//direcionar para o index
		header( "Location: index.php" );
	}
	//incluir o arquivo para conectar no banco
	include "../configuracoes/conectar.php";
   
    //funcao para formatar datas
      function formatardata($data) {
        // 29/09/2017 -> 2017-09-29
        $data = explode( "-", $data );
        $data = $data[2]."-".$data[1]."-".$data[0];
        return $data;
      }
?>


<!DOCTYPE html>
<html lang="ptBR">
<head>
	<title>Home Professor</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.3.1/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<link rel="stylesheet" type="text/css" href="../outros/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="../outros/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="../outros/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../outros/select2/select2.min.css">
	
	<link rel="stylesheet" type="text/css" href="../outros/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">

</head>
<body>
	<div class="menu">
		<ul class="nav justify-content-end">
		
		<li class="nav-item">
			<a class="nav-link" href="home">Inicio</a>
		</li>
		
		<li class="nav-item">
			<a class="nav-link" href="turmas">Turmas</a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="atividade">atividade</a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="perfil">Perfil</a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="sair.php">sair</a>
		</li>
		
		
		</ul>	
	</div>

	


	<main>
		

			  <!--aqui e para fazer as paginas clicadas no menu aparecer-->
	            <?php
				//recuperar o parametro p que vai ser o nome da pagina q esta na pasta paginas

				if ( isset ( $_GET["p"] ) ){
					$p = $_GET["p"];
	                $parametro = explode("/", $p);
	                $p = $parametro[0];
					//mostrar o conteudo
						//echo $p;
				} else {
					//aqui e para a pagina padrao ser a home pq quando logar vai jogar nela que tem q estar la na pasta paginas tbm
					//podemos por os avisos
					$p = "home";

					//echo $p;
				}
				//pegando o nome da pagina que esta na variavel $p e concatenando com o .php
                $pagina = "paginas/".$p.".php";
            
                //verificar se a pagina existe
                if ( file_exists( $pagina ) ) {
                    include $pagina;
                } else {
                	//se n existir vai para a 404 q temos que fazer uma
                    include "paginas/404.php";
                }
            
			?>
            <!--final das paginas-->




	</main>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="../outros/jquery/jquery-3.2.1.min.js"></script>
	<script src="../outros/animsition/js/animsition.min.js"></script>
	<script src="../outros/bootstrap/js/popper.js"></script>
	<script src="../outros/bootstrap/js/bootstrap.min.js"></script>
	<script src="../outros/select2/select2.min.js"></script>
	<script src="../outros/daterangepicker/moment.min.js"></script>
	<script src="../outros/daterangepicker/daterangepicker.js"></script>
	<script src="../outros/countdowntime/countdowntime.js"></script>
	<script src="../js/main.js"></script>

</body>
</html>