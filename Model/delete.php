<?php 
set_include_path('C:\xampp\htdocs\curso_php');
include_once("Model/config.php");

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $Delete = "DELETE FROM tabela_conteudos where id ='$id'";
    $conexao->query($Delete);
    echo 'Post deletado com sucesso';
    echo '<a href="../VIEW/update.php">Clique aqui para voltar para a listagem dos posts</a>';
}
?>
