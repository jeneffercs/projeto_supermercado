<?php 

include 'conexao.php';

try{

    $id = $_GET['id'];
   
    $sql = "DELETE FROM tb_produtos Where id=$id";

    $comando = $con->prepare($sql);

    $comando->execute();

    header('location: ../admin/gerenciar_produtos.php');

}catch(PDOException $erro){
    echo $erro ->getMessage();
}
?>
