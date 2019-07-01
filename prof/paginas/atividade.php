<div class="tatividades">
  <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <br />
            <h2>Atividades</h2>
                  <?php

                    if ( isset ($parametro[1] ) ) {
                      $ids = trim( $parametro[1] );

                      $aluno_id   = $ids[0];
                      $materia_id = $ids[1];
                      
                      $sql = "SELECT * FROM atividade WHERE aluno_id = $aluno_id AND materia_id = $materia_id";
                      $consulta = $pdo->prepare($sql);                                
                      $consulta->execute();

                      while ( $dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                        $id        = $dados->id;
                        $imagem    = $dados->imagem; 
                        $descricao = $dados->descricao;
                        $imagem = $imagem . "p.jpg";
                        $img = "../fotos/$imagem";

                      
                    ?>
                  

                    <div class="card" style="width: 18rem;" id="card">
                      <?php echo" <img src='../fotos/$imagem'>"?>
                      
                      <div class="card-body">
                       
                        <p class="card-text"><?=$descricao;?></p>
                        <a href='corrigirAtividade/<?=$id;?>' class='btn btn-success'>Corrigir Atividade</a>
                      </div>
                    </div>

                    <?php
                      }
                    ?>


                       
              
              </div>
    <?php
		
      } else {
          //mensagem de erro ao acessar diretamente o arquivo
      echo "<div class='alert alert-danger container'>
      ERRO: tentativa inválida</div>";
      }
    ?>
