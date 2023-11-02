<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    setlocale(LC_TIME, 'pt_BR', 'ptb');
    ?>
    <link rel="stylesheet" href="../css/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Categoria 1</a>
                    <a class="nav-link" href="#">Categoria 2</a>
                    <a class="nav-link" href="#">Categoria 3</a>
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Categoria 4</a>
                </div>
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?php date_default_timezone_set('America/Sao_Paulo');
                                                                                            echo date('d') . " de " . strftime("%B") . " de " . date("Y - H:i"); ?></a>
            </div>
        </div>
    </nav>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <span class="input-group-text" id="basic-addon2" name="Btn_Busca">Busca</span>
    </div>
    <?php
    set_include_path('C:\xampp\htdocs\curso_php');
    include_once("Model/get.php");
    while ($data = mysqli_fetch_assoc($dados)) {
        echo "<div class='container'>";
        echo "    <div class='image'>";
        echo "        <img src=" . $data['imagem'] . " alt='Imagem'>";
        echo "    </div>";
        echo "    <div class='content'>";
        echo "           <h2>".date("d/m/Y",strtotime($data['dtPost']))." - ".$data['titulo']."</h2>";
        echo "        <p>".$data['conteudo']."</p>";
        echo "    </div>";
        echo "</div>";
    }
    ?>
</body>

</html>