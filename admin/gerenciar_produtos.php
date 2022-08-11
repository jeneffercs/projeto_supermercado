<?php

include '../backend/conexao.php';

try {
    $sql = "SELECT * FROM tb_produtos";

    $comando = $con->prepare($sql);

    $comando->execute();

    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);
    


} catch (PDOException $erro) {
    
    echo $erro->getMessage();
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar produtos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div id="cx">
        <h3>Gerenciar produtos</h3>

        <div id="tabela">

            <table border="1">
                
                <tr>
                    <th>ID</th>
                    <th>produto</th>
                    <th>marca</th>
                    <th>categoria</th>
                    <th>Validade</th>
                    <th>Valor</th>
                    <th>Alterar</th>
                    <th>Deletar</th>
                </tr>
                <?php
                foreach($dados as $produtos):
                ?>
                <tr>
                    <td><?php echo $produtos ['id'];?></td>
                    <td><?php echo $produtos ['produto'];?></td>
                    <td><?php echo $produtos ['marca'];?></td>
                    <td><?php echo $produtos ['categoria'];?></td>
                    <td><?php echo $produtos ['validade'];?></td>
                    <td>R$<?php echo $produtos ['valor'];?></td>
                    <td>Alterar</td>
                    <td>
                      <a href="../backend/delete_produtos.php?id=<?php echo $produtos ['id'];?>">Deletar</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </table>

        </div>
    </div>
     <?php 
     ?>
    
</body>
</html>