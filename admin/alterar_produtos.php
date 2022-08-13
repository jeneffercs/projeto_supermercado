<?php 

include '../backend/conexao.php';

$id = $_GET['id'];

try{

    $sql = "SELECT * FROM tb_produtos WHERE id = $id";

$comando = $con->prepare($sql);

$comando->execute();

$dados = $comando->fetchAll(PDO::FETCH_ASSOC);

}catch (PDOException $erro){
    echo $erro->getMessage();

}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Alterar Produtos</title>
</head>
<body>
    
    <div id=container>
        <h3>Alterar Produtos</h3>

        <form action="../backend/_alterar_produtos.php" method="post">
            <div id="grid-alterar">

                <div>
                    <label for="">ID</label>
                    <input type="text" name="id" id="id" value="<?php echo $produtos[0]['id'];?>" readonly>

                </div>


                <div>
                    <label for="">Produto</label>
                    <input type="text" name="produto" id="produto" value="<?php echo $produtos[0]['produto'];?>">
                </div>

                <div>
                    <label for="">marca</label>
                    <input type="text" name="marca" id="marca" value="<?php echo $produtos[0]['marca'];?>">
                </div>

                <div>
                    <label for="" >categoria</label>
                    <input type="text" name="categoria" id="categoria" value="<?php echo $produtos[0]['categoria'];?>">
                </div>

                <div>
                    <label for="" >validade</label>
                    <input type="text" name="validade" id="validade" value="<?php echo $produtos[0]['validade'];?>">
                </div>


                <div>
                    <label for="">valor</label>
                    <input type="text" name="valor" id="valor" value="<?php echo $produtos[0]['valor'];?>">
                </div>

            </div>

            <input type="submit" value="salvar">
        </form>

    </div>
</body>
</html>