<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/post.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
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
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="update.php?controle=1">Listar Posts</a></li>
            <li><a class="dropdown-item" href="post.php?controle=2">Inserir novo post</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?php date_default_timezone_set('America/Sao_Paulo'); echo date('d') . " de " . strftime("%B") . " de " . date("Y - H:i"); ?></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php
    set_include_path('C:\xampp\htdocs\curso_php');
    include('Controller/input.php');
    include_once("Model/config.php");

    if(isset($_GET['controle']) == '2'){
        echo "<h2 class='titulo_controle'>Inserir Posts</h2>";
    }
    echo "<div class='container'>";
    echo "<form action='../Model/postSave.php' enctype='multipart/form-data' method='POST'>";
    echo "<h2>Novo conteudo</h2>";
    foreach ($inputs as $inputs) {
        echo "<div class='form-group'>";
        if ($inputs->id == "categoria") {
            echo "<label for=''>" . $inputs->titulo . "</label>";
            echo "<select id=" . $inputs->id . " name=" . $inputs->nome . ">";
            echo "<option value='1'>Categoria 1 - HTML/CSS</option>";
            echo "<option value='2'>Categoria 2 - JS</option>";
            echo "<option value='3'>Categoria 3 - APRESENTACAO PITCH</option>";
            echo "<option value='4'>Categoria 4 - PHP</option>";
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
    ?>
</body>

</html>