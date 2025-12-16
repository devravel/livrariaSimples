<?php
include 'conexao.php'; 

function inserir() {
    if (!isset($_POST["titulo"], $_POST["autor"], $_POST["ano"])) {
        echo "Erro: Dados do formulário incompletos.";
        return; 
    }
    
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $ano = $_POST["ano"];
    
    $banco = abrirBanco();
    
    $sql = "INSERT INTO livros (titulo, autor, ano)
            VALUES ('$titulo', '$autor', '$ano')";
    
    if ($banco->query($sql) === TRUE) {
        echo "Livro '$titulo' cadastrado com sucesso!<br><a href='index.php'>Voltar</a>";
    } else {
        echo "Erro: " . $banco->error;
    }

    $banco->close();
}

if (isset($_POST["acao"])) {
    if ($_POST["acao"] == "inserir") {
        inserir();
    }
}
?>