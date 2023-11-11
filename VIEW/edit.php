<?php
set_include_path('C:\xampp\htdocs\curso_php');
include_once("Model/config.php");

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $select = "SELECT * FROM tabela_conteudos WHERE id ='$id'";
    $query = $conexao->query($select);

    if ($query->num_rows > 0) {
        while ($data = mysqli_fetch_assoc($query)) {
            $Titulo_Post =  $data['titulo'];
            $Categoria_Post = $data['categoria'];
            $Data_Post = $data['dtPost'];
            $Texto_Post = $data['conteudo'];
            $Img_name = $data['titulo_img'];
            $img = $data['imagem'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/post.css">
    <title>Document</title> 
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/update.css">
        <link rel="stylesheet" href="../css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Tela de atualizar registro</title>
    </head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="update.php?controle=1">Listar Posts</a></li>
                            <li><a class="dropdown-item" href="post.php?controle=2">Inserir novo post</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?php date_default_timezone_set('America/Sao_Paulo');
                                                                                                    echo date('d') . " de " . strftime("%B") . " de " . date("Y - H:i"); ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h2>Editar publicação</h2>
    <div class="container">
        <form action="../Model/updateSave.php" enctype="multipart/form-data" method="POST">
            <h2>Novo conteudo</h2>
            <div class="form-group">
                <label for="">titulo do post</label>
                <input type="text" id="titulo" name="Titulo" value="<?php echo $Titulo_Post; ?>">
            </div>
            <div class="form-group">
                <label for="">categoria do post</label>
                <select id="categoria" name="Categoria">
                    <option value="1" <?php echo (($Categoria_Post) && $Categoria_Post == '1') ? 'selected' : ''; ?>>Categoria 1 - HTML/CSS</option>
                    <option value="2" <?php echo (($Categoria_Post) && $Categoria_Post == '2') ? 'selected' : ''; ?>>Categoria 2 - JS</option>
                    <option value="3" <?php echo (($Categoria_Post) && $Categoria_Post == '3') ? 'selected' : ''; ?>>Categoria 3 - APRESENTACAO PITCH</option>
                    <option value="4" <?php echo (($Categoria_Post) && $Categoria_Post == '4') ? 'selected' : ''; ?>>Categoria 4 - PHP</option>
                </select>

            </div>
            <div class="form-group">
                <label for="">Data da publicação</label>
                <input type="date" id="Data" name="Data" value="<?php echo $Data_Post;?>">
            </div>
            <div class="form-group">
                <input type="file" id="imagem" name="imagem">
                <input type="text" id="imagem_titulo" name="imagem_titulo" value="<?php echo $Img_name;?>">
            </div>
            <div class="form-group">
                <label for="">Conteúdo</label>
                <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
                <input type="text" id="Conteudo" name="Conteudo" value="<?php echo $Texto_Post;?>">
                <input type="submit" id="submit" name="update">
            </div>
        </form>
    </div>
</body>
</html>