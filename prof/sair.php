<?php
	//iniciar a sessao
	session_start();
	//apagar os dados da sessao
	unset( $_SESSION["professor"] );
	//direcionar para o index.php
	header( "Location: ../index.php" );