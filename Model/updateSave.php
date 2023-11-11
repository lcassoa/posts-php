<?php 
 set_include_path('C:\xampp\htdocs\curso_php');
 include_once("Model/config.php");
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $Titulo_Post =  $_POST['Titulo'];
    $Categoria_Post = $_POST['Categoria'];
    $Data_Post =    $_POST['Data'];
    $Texto_Post =   $_POST['Conteudo'];
    $TituloImg_Post =   $_POST['imagem_titulo'];
    $Img_Post = $_FILES['imagem'];
    if ($Img_Post) {
        if ($Img_Post['error']) {
            die("Por favor coloque uma imagem");
        }
        if ($Img_Post['size'] > 2097152) {
            die("Arquivo muito grande");
        }
    }
    $nomeDoArquivo = $Img_Post['name'];
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if ($extensao != 'jpg' && $extensao != 'png' && $extensao != 'jpeg')
        die("Tipo de arquvio nao aceito");
    // Salvar a imagem em um diretório
    $imagem = $nomeDoArquivo . '.' . $extensao;
    if (move_uploaded_file($Img_Post['tmp_name'], $imagem)) {
        // Ler o conteúdo da imagem e converter em base64
        $conteudoImagem = file_get_contents($imagem);
        $base64Imagem = base64_encode($conteudoImagem);

        // Inserir no banco de dados, incluindo o base64
        $sqlUpdate = "UPDATE tabela_conteudos SET titulo = '$Titulo_Post',categoria = '$Categoria_Post',imagem = '$base64Imagem',extensao = '$extensao',conteudo = '$Texto_Post' ,titulo_img='$TituloImg_Post', dtPost = '$Data_Post'
        WHERE id ='$id'";
        $query = $conexao->query($sqlUpdate);
        echo 'Post alterado com sucesso';
        echo '<a href="../VIEW/update.php">Clique aqui para voltar para a listagem dos posts</a>';
    } else {
        echo 'Erro ao salvar a imagem.';
    }  
}
?>