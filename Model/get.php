<?php 
set_include_path('C:\xampp\htdocs\curso_php');
include_once("config.php");

$query = "SELECT * FROM tabela_conteudos ORDER BY id DESC";
$dados = $conexao->query($query);
?>