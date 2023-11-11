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
            $extensao = $data['extensao'];
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>dados</title>
    <style>
        .container_dados {
            display: flex;
            align-items: center;
            margin: 20px;
        }

        .image_dados {
            max-width: 200px;
            margin-right: 20px;
        }

        .text-container_dados {
            flex-grow: 1;
        }
    </style>
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
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?php date_default_timezone_set('America/Sao_Paulo'); echo date('d') . " de " . strftime("%B") . " de " . date("Y - H:i"); ?></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="container_dados">
        <?php echo "        <img src='data:image/" . $extensao . ";base64," . $img . "' alt='Imagem' class='image_dados'>";?>
        <div class="text-container_dados">
            <h2><?php echo $Titulo_Post?></h2>
            <p><?php echo $Texto_Post?></p>
        </div>
    </div>
</body>
</html>