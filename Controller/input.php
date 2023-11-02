<?php 
    class input {
        public $id;
        public $tipo;
        public $nome;
        public $titulo;

        public function __construct($id,$tipo,$nome, $titulo)
        {
            $this->id = $id;
            $this->tipo = $tipo;
            $this->nome = $nome;
            $this->titulo = $titulo;
        }
    }
    
    $titulo = new input("titulo","text","Titulo","titulo do post");
    $categoria = new input("categoria","text","Categoria","categoria do post");
    $Data = new input("Data","date","Data","Data da publicação");
    $Conteudo = new input("Conteudo","text","Conteudo","Conteúdo");
    $imagem = new input("imagem","file","imagem","Imagem");
    $inputs = array($titulo, $categoria, $Data, $imagem);
?>