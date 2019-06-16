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

                    

                </div>

                    






    <?php 
        }

    }
    
    ?>