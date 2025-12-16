<?php
include 'conexao.php'; // Inclui o arquivo com a função abrirBanco()


function inserir() {

    if (!isset($_POST["nome"], $_POST["login"], $_POST["senha"])) {
        echo "Erro: Dados do formulário incompletos.";
        return; 
    }
    
    $nome = $_POST["nome"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    
    $banco = abrirBanco();
    
    $sql = "INSERT INTO usuarios (nome, login, senha)
            VALUES ('$nome', '$login', '$senha')";
    
    if ($banco->query($sql) === TRUE) {
        echo "Usuário $nome cadastrado com sucesso!<br><a href='login.php'>Fazer Login</a>";
    } else {
        echo "Erro ao cadastrar usuário: " . $banco->error;
    }

    $banco->close();
}


if (isset($_POST["acao"])) {
    if ($_POST["acao"] == "inserir") {
        inserir();
    }
}
?>