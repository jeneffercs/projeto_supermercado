<?php 
//incluindo arquivo de conexao
include 'backend/conexao.php';

try{
    //monta a querry sql
    $sql= "SELECT * FROM tb_produtos";

    //prepara a execuçao da querry SQL acima
    $comando = $con->prepare($sql);

    //executa o comando com a quer no banco de dados
    $comando->execute();

    //Criando a variavel que ira armazenar os dados ,e setando o fetch em modo associativo(chave/valor)
    $dados =$comando->fetchAll(PDO::FETCH_ASSOC);
    
   // echo "<pre>";
   // var_dump($dados);
   // echo "</pre>";



}catch(PDOException $erro){
    echo $erro->getMessage();
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Listar Produtos</title>
</head>

<body>

    <div id="container">
        <h1>Lista de Produtos</h1>
        <div id="grid-Produtos">
            <?php
            foreach ($dados as $d) :
            ?>
                <figure class="figure-produtos">

                    <img class="img-produtos" src="img/viagem-faltando.png" alt="Imagem da viagem">

                    <figcaption class="figcaption-produtos">
                        <h4><?php echo $d['produto']; ?></h4>
                        <h5><?php echo $d['marca']; ?></h5>
                        <h5><?php echo $d['categoria']; ?></h5>
                        <small><?php echo $d['validade']; ?></small>
                        <h5>R$<?php echo $d['valor']; ?></h5>
                        <button class="btn-comprar">Comprar</button>
                    </figcaption>

                </figure>
            <?php endforeach; ?>

        </div>

    </div>
</body>

</html>