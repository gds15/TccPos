<div class="tatividades">
  <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h2>Turmas</h2>

            <?php
                  $pro = $_SESSION["prof"]["id"];
                  //so vai listar as atividades do logado
                  $sql = "SELECT tu.*, t.nome FROM turma_prof tu JOIN turma t on (t.id = tu.turma_id) WHERE professor_id = $pro";
                  $consulta = $pdo->prepare($sql);
                  $consulta->bindParam(1, $_SESSION["aluno"]["id"]);
                  $consulta->execute();

                  while ( $dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                    $id        = $dados->id;
                    $nome      = $dados->nome;
                    $turma_id  = $dados->turma_id;
         
              ?>

                    <div class="card" style="width: 18rem;" id="card">
                    <div class="card-body">
                        <h5 class="card-title"><?=$nome;?></h5>
                        <a href="listaMateria/<?=$turma_id;?>" class="btn btn-primary">Ver Matérias</a>
                      </div>
                      </div>

                   <?php   } ?>
                            
            </div>    
        </div>
    </div>
</div>