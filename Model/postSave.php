<?php 
set_include_path('C:\xampp\htdocs\curso_php');
include_once("config.php");
if (isset($_POST['submit'])) {
    $Titulo_Post =  $_POST['Titulo'];
    $Categoria_Post = $_POST['Categoria'];
    $Data_Post =    $_POST['Data'];
    $Texto_Post =   $_POST['Conteudo'];
    $Img_Post =     $_FILES['imagem'];
    /*  $imagem = file_get_contents($Img_Post['tmp_name']);
    $base64Img = base64_encode($imagem); */

    if ($Img_Post) {
        if ($Img_Post['error']) {
            die("falha ao enviar arquivo");
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
        $Result = mysqli_query($conexao, "INSERT INTO
            tabela_conteudos(titulo, categoria, dtPost, conteudo,imagem,extensao,titulo_img) 
            values
            ('$Titulo_Post', '$Categoria_Post', '$Data_Post', '$Texto_Post', '$base64Imagem','$extensao','$nomeDoArquivo')");

        echo 'Imagem convertida em base64 e salva no banco de dados.';
        echo '<a href="../VIEW/index.php">Clique aqui para ir para a listagem dos posts</a>';
    } else {
        echo 'Erro ao salvar a imagem.';
    }
}
