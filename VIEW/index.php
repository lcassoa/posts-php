<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    setlocale(LC_TIME, 'pt_BR', 'ptb');
    ?>
    <link rel="stylesheet" href="../css/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="?categoria=1">Categoria 1</a>
                    <a class="nav-link" href="?categoria=2">Categoria 2</a>
                    <a class="nav-link" href="?categoria=3">Categoria 3</a>
                    <a class="nav-link" href="?categoria=4" tabindex="-1">Categoria 4</a>
                </div>
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?php date_default_timezone_set('America/Sao_Paulo');
                                                                                            echo date('d') . " de " . strftime("%B") . " de " . date("Y - H:i"); ?></a>
            </div>
        </div>
    </nav>
    <div class="input-group mb-3">
        <form action="" method="POST">
            <input id="busca" name="busca_valor" type="text" class="form-control" placeholder="Busca" aria-label="Busca" aria-describedby="basic-addon2">
            <button type="submit" class="btn btn-primary" name="busca">Primary</button>
        </form>
    </div>
    <?php
    set_include_path('C:\xampp\htdocs\curso_php\Model');
    include_once("config.php");
    $categoria = 1;
    if (isset($_GET['categoria'])) {
        $categoria = $_GET['categoria'];
        $StrHome = "<h4>Home >Categoria " . $categoria . "</h4>";
    } else {
        $StrHome = "<h4>Home > Categoria 1 </h4>";
    }

    if (isset($_POST['busca']) && $_POST['busca_valor'] != '') {
        $StrHome = '<h4>Home > Busca </h4>';
        echo $StrHome;
        $busca = $conexao->real_escape_string($_POST['busca_valor']);
        $query = "SELECT titulo,categoria,imagem,extensao,conteudo,id, DATE_FORMAT(dtPost, '%d/%m/%Y') as dtPost
        FROM tabela_conteudos WHERE titulo like '$busca%' or conteudo like '%$busca%' or dtPost = DATE_FORMAT(STR_TO_DATE('$busca', '%d/%m/%Y'), '%Y-%m-%d')  ORDER BY id DESC";

        $dados = $conexao->query($query);

        if(mysqli_num_rows($dados) > 0){
            echo "<h5>Resultado da pesquisa por: " . $busca . "<h5>";
        while ($data = mysqli_fetch_assoc($dados)) {
            $id = $data['id'];
            echo "<a href='dados.php?id=".$id."'>";
            echo "<div class='div-busca'>";
            echo "<div class='titulo'>@" . $data['dtPost'] . "-" . $data['titulo'] . "</div>";
            echo "<div class='conteudo'>";
            echo "<p>" . $data['conteudo'] . "</p>";
            echo "<h6>LEIA MAIS</h6>";
            echo "</div>";
            echo "</a>";
        }
    }else{
        echo "<h5>Nenhum resultado encontrado</h5>";
    }
    } else {
        echo $StrHome;
        $query = "SELECT titulo,categoria,imagem,extensao,conteudo, DATE_FORMAT(dtPost, '%d/%m/%Y') as dtPost
        FROM tabela_conteudos WHERE categoria = '$categoria' ORDER BY dtPost DESC";
        $dados = $conexao->query($query);
        while ($data = mysqli_fetch_assoc($dados)) {
            echo "<div class='container'>";
            echo "    <div class='image'>";
            echo "        <img src='data:image/" . $data['extensao'] . ";base64," . $data['imagem'] . "' alt='Imagem'>";
            echo "    </div>";
            echo "    <div class='content'>";
            echo "           <h2>" . $data['dtPost'] . " - " . $data['titulo'] . "</h2>";
            echo "        <p>" . $data['conteudo'] . "</p>";
            echo "    </div>";
            echo "</div>";
        }
    }
    ?>
</body>

</html>