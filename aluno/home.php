<!DOCTYPE html>
<html lang="ptBR">
<head>
	<title>Home Aluno</title>
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
			<a class="nav-link" href="#">Inicio</a>
		</li>
		
		<li class="nav-item">
			<a class="nav-link" href="#">Atividades</a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="#">Perfil</a>
		</li>
		
		
		</ul>	
	</div>

	<main>
		
		<!--aqui e para fazer as paginas clicadas no menu aparecer-->
	        <?php

				if ( isset ( $_GET["p"] ) ){
					$p = $_GET["p"];
	                $parametro = explode("/", $p);
	                $p = $parametro[0];
					
				} else {
					
					$p = "home";
				}
				
                $pagina = "paginas/".$p.".php";
            
                if ( file_exists( $pagina ) ) {
                    include $pagina;
                } else {
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