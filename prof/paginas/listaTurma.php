<?php
	
	if ( isset ($parametro[1] ) ) {
	    //recuperar o id
		$seila = trim( $parametro[1] );

		//$teste = "'". $seila . "'";
		//$array = explode(' ', $teste);
		//print_r($array);
		
		//$seila  =  explode( " - " , $seila );
		$turma_id   = $seila[0];
		$materia_id = $seila[1];


		$sql = "select a.*, t.nome as nomet from aluno a join turma t on (t.id = a.turma_id) where turma_id = $turma_id";
		$consulta = $pdo->prepare($sql);
		$consulta->execute();

		while ( $dados = $consulta->fetch(PDO::FETCH_OBJ)) {
			$id          = $dados->id;
			$nome        = $dados->nome;
			$nomet		 = $dados->nomet;


?>
	


<table class="table table-bordered table-striped table-dark">
  <thead>
    <tr>
      
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
	  <th scope="col">Turma</th>


      
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?=$id;?></td>
      <td><?=$nome;?></td>
	  <td><?=$nomet;?></td>
     
    </tr>
  </tbody>
</table>


<?php
		}
    } else {
        //mensagem de erro ao acessar diretamente o arquivo
		echo "<div class='alert alert-danger container'>
		ERRO: tentativa inválida</div>";
    }
?>