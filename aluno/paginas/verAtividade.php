<div class="tatividades">
<div class="container">

<?php
                  
                  //so vai listar as atividades do logado
                  $sql = "SELECT a.*, m.nome FROM atividade a inner join materia m on a.materia_id = m.id WHERE aluno_id = ? ORDER BY id DESC";
                  $consulta = $pdo->prepare($sql);
                  $consulta->bindParam(1, $_SESSION["aluno"]["id"]);
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
                    <?php echo" <img src='../fotos/$imagem'>"?>

                    <p><strong>Descrição:</strong> <?=$descricao;?></p>

                    <p><strong>Materia:</strong> <?=$nome;?></p>

                    <p><strong>Nota:</strong> <?=$nota;?></p>

                    <p><strong>Correção:</strong> <?=$correcao;?></p>

                    

                </div>

                    






    <?php 
        }
    
    ?>