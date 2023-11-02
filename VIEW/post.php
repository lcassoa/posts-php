<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/post.css">
    <title>Document</title>
    <?php
    set_include_path('C:\xampp\htdocs\curso_php');
    include('Controller/input.php');
    include_once("Model/config.php");
    echo "<h2>Inserir nova puclicação</h2>";
    echo "<div class='container'>";
    echo "<form action='post.php' enctype='multipart/form-data' method='POST'>";
    echo "<h2>Novo conteudo</h2>";
    foreach ($inputs as $inputs) {
        echo "<div class='form-group'>";
        if ($inputs->id == "categoria") {
            echo "<label for=''>" . $inputs->titulo . "</label>";
            echo "<select id=" . $inputs->id . " name=" . $inputs->nome . ">";
            echo "<option value='1'>Categoria 1</option>";
            echo "<option value='2'>Categoria 2</option>";
            echo "<option value='3'>Categoria 3</option>";
            echo "</select>";
        } else if ($inputs->id == "imagem") {
            echo "<input type=" . $inputs->tipo . " id=" . $inputs->id . " name=" . $inputs->nome . ">";
        } else {
            echo "<label for=''>" . $inputs->titulo . "</label>";
            echo "<input type=" . $inputs->tipo . " id=" . $inputs->id . " name=" . $inputs->nome . ">";
        }
        echo "</div>";
    }
    echo "<div class='form-group'>";
    echo "<label for=''>" . $Conteudo->titulo . "</label>";
    echo "<input type=" . $Conteudo->tipo . " id=" . $Conteudo->id . " name=" . $Conteudo->nome . ">";
    echo "<input type='submit' id='submit' name='submit'>";
    echo "</form>";
    echo "</div>";

    if (isset($_POST['submit'])) {
        $Titulo_Post =  $_POST['Titulo'];
        $Categoria_Post=$_POST['Categoria'];
        $Data_Post =    $_POST['Data'];
        $Texto_Post =   $_POST['Conteudo'];
        $Img_Post =     $_FILES['imagem'];

        if ($Img_Post['error']) {
            die("falha ao enviar arquivo");
        }
        if ($Img_Post['size'] > 2097152) {
            die("Arquivo muito grande");
        }
        $nomeDoArquivo = $Img_Post['name'];
        $novoNome = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
        
        if($extensao != 'jpg' && $extensao != 'png' )
        die("Tipo de arquvio nao aceito");

           $Result = mysqli_query($conexao, "INSERT INTO
            tabela_conteudos(titulo,categoria,dtPost,conteudo   ,imagem) 
            values
            ('$Titulo_Post','$Categoria_Post','$Data_Post','$Texto_Post','$nomeDoArquivo')");
    }
    ?>
</head>

<body>
</body>

</html>