<div class="tatividades">
<div class="container">


<?php

    if (isset ($parametro[1])) {
                
        $aa = trim( $parametro[1] );
    
                  
                  //so vai listar as atividades do logado
                  $sql = "SELECT a.*, m.nome FROM atividade a inner join materia m on a.materia_id = m.id WHERE a.id = ?";
                  $consulta = $pdo->prepare($sql);
                  $consulta->bindParam(1, $aa);
                  $consulta->execute();

                  while ( $dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                    $id = $dados->id;
                    $imagem = $dados->imagem;
                    $descricao = $dados->descricao;
                    $nota = $dados->nota;
                    $correcao = $dados->correcao;
                    $aluno_id = $dados->aluno_id;
                    $nome = $dados->nome;
                    $ativo = $dados->ativo;

                    $imagem = $imagem . "p.jpg";
                    $img = "../fotos/$imagem";
                  
    ?>          
                <div class="verAti">
                    <?php echo" <a class='image-link' href='../fotos/$imagem'><img src='../fotos/$imagem'></a>"?>

                    <p><strong>Descrição:</strong> <?=$descricao;?></p>

                    <p><strong>Materia:</strong> <?=$nome;?></p>

                    <p><strong>Nota:</strong> <?=$nota;?></p>

                    <p><strong>Correção:</strong> <?=$correcao;?></p>

                    <?php
                    //aqui vou ver se a nota esta vazia para poder mandar para o editar atividade
                    //se a nota n for empty vai por um botao vermelho q n manda pra lugar nenhum pq o professor ja vai ter dado a nota e corrigido a atividade
                    //agora se a nota for empty ele vai poder editar ai vai mostrar o botao azul normal com o link para o editar atividade.php que e o msm form do outro so q pra edicao
                    //forma simples de resolver aquele problema de ontem
                        if( !empty ($nota)) {
                            echo " <a type='button' href='#' class='btn btn-danger'>Editar</a>";
                        } else {
                            echo "<a type='button' href='editarAtividade/$id' class='btn btn-primary'>Editar</a>";
                        }
                    ?>

                </div>

                    






    <?php 
        }

    }
    
    ?>