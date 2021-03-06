
<div class="tatividades">
  <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <br />
            <h2>Atividades</h2>
            
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a href="#feitas" class="nav-link active" role="tab" data-toggle="tab">Atividades Feitas</a>
              </li>

              <li class="nav-item">
                <a href="#fazer" class="nav-link" role="tab" data-toggle="tab">Atividades a Fazer</a>
              </li>       
            </ul>

            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="feitas">
              <h4>Atividades Feitas</h4>


                  <?php
                  
                                  //so vai listar as atividades do logado
                                  $sql = "SELECT a.*, m.nome FROM atividade a inner join materia m on a.materia_id = m.id WHERE aluno_id = ? ORDER BY id DESC";
                                  $consulta = $pdo->prepare($sql);
                                  $consulta->bindParam(1, $_SESSION["aluno"]["id"]);
                                  $consulta->execute();

                                  while ( $dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                                    $id        = $dados->id;
                                    $imagem    = $dados->imagem;
                                    $descricao = $dados->descricao;
                                    $nota      = $dados->nota;
                                    $correcao  = $dados->correcao;
                                    $aluno_id  = $dados->aluno_id;
                                    $nome      = $dados->nome;
                                    $ativo     = $dados->ativo;

                                    $imagem = $imagem . "p.jpg";
                                    $img = "../fotos/$imagem";
                    ?>

                    <div class="card" style="width: 18rem;" id="card">
                      <?php echo" <img src='../fotos/$imagem'>"?>
                      
                      <div class="card-body">
                        <h5 class="card-title"><?=$nome;?></h5>
                        <p class="card-text"><?=$descricao;?></p>
                        <a href="verAtividade/<?=$id;?>" class="btn btn-primary">Ver Atividade</a>
                      </div>
                    </div>

                    <?php
                      }
                    ?>


                       
              
              </div>


              <div role="tabpanel" class="tab-pane" id="fazer">
              <h4>Atividades a Fazer</h4>

              <?php
                  
                  //so vai listar as atividades com feita = n
                  $sql = "select a.*, a.dataEntrega, m.nome, p.nomep from atividadesafazer a inner join professor p on (a.professor_id = p.id) inner join materia m on (a.materia_id = m.id) where a.turma_id = ? AND a.ativo = 's'"; 
                  
            
                  $consulta = $pdo->prepare($sql);
                  $consulta->bindParam(1, $_SESSION["aluno"]["turma_id"]);
                  $consulta->execute();

                  while ( $dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                    $id           = $dados->id;
                    $descricao    = $dados->descricao;
                    $nome         = $dados->nome;
                    $dataEntrega  = $dados->dataEntrega;
                    $nomep        = $dados->nomep;
                    $materia_id   = $dados->materia_id;
                    $turma_id     = $dados->turma_id; 
                    
         
                    
                
              ?>

              <div class="card" style="width: 18rem;" id="card">
                  <img class="card-img-top" src=".../100px180/" alt="Imagem de capa do card">
                  <div class="card-body">
                    <h5 class="card-title"><?=$descricao;?></h5>
                    <p class="card-text">Data para Entrega: <?php echo date('d/m/Y', strtotime($dataEntrega)); ?></p>
                    <p class="card-text">Professor: <?=$nomep;?></p>
                    <p class="card-text">Materia: <?=$nome;?></p>
                  
                    <a href="enviarAtividade/<?=$id;?>" class="btn btn-primary">Fazer Atividade</a>
                  </div>
                </div>

              <?php
                }
              ?>

              </div>
              </div>
            </div>
          </div>
      </div>
</div>

   