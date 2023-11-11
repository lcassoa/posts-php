<?php
set_include_path('C:\xampp\htdocs\curso_php\Model');
include_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">

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
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?php date_default_timezone_set('America/Sao_Paulo'); echo date('d') . " de " . strftime("%B") . " de " . date("Y - H:i"); ?></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Codigo</th>
      <th scope="col">Titulo</th>
      <th scope="col">Categoria</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php
    if(isset($_GET['controle']) == '1'){
        echo "<h2 class='titulo_controle'>Listar Posts</h2>";
    }

    $query = 'SELECT id,titulo,categoria FROM tabela_conteudos';
    $dados = $conexao->query($query);
    if (mysqli_num_rows($dados) > 0) {
        while($data =mysqli_fetch_assoc($dados)){
            echo "<tr>";
            echo "<td scope='col'>".$data['id']."</td>";
            echo "<td scope='col'>".$data['titulo']."</td>";
            echo "<td scope='col'>".$data['categoria']."</td>";
            echo "<td scope='col'><a class='btn btn-primary' href='edit.php?id=".$data['id']."'>Alterar</a></td>";
            echo "<td scope='col'><a class='btn btn-primary' href='../Model/delete.php?id=".$data['id']."' styles='backgroundColor:red;'>Excluir</a></td>";
            echo "</tr>";
        }
    } else {
        echo "Nenhum Registro encontrado";
    }
    ?>
  </tbody>
</table>
</body>

</html>