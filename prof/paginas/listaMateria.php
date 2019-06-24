<?php
	
	if ( isset ($parametro[1] ) ) {
	    //recuperar o id
	    $turma_id = trim( $parametro[1] );

?>

<div class="tatividades">
  <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h2>Matérias</h2>

            <?php
                  $pro = $_SESSION["prof"]["id"];
                  //listar as matérias do professor para aquela turma
                  $sql = "SELECT tu.*, m.nome FROM turma_prof tu JOIN materia m on (m.id = tu.materia_id) WHERE turma_id = $turma_id AND professor_id = $pro";
                  $consulta = $pdo->prepare($sql);
                  $consulta->execute();

                  while ( $dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                    $id          = $dados->id;
                    $nome        = $dados->nome;
                    $materia_id  = $dados->materia_id;
         
              ?>

                        <div class="card" style="width: 18rem;" id="card">
                        <div class="card-body">
                        <h5 class="card-title"><?=$nome;?></h5>
                            <a href="listaTurma/<?=$materia_id;?>" class="btn btn-primary">Ver Alunos</a>
                        </div>
                        </div>

                <?php 
                    } 
                ?>
                            
            </div>    
        </div>
    </div>
</div>

<?php
    } else {
        //mensagem de erro ao acessar diretamente o arquivo
		echo "<div class='alert alert-danger container'>
		ERRO: tentativa inválida</div>";
    }
?>