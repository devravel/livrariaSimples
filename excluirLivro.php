<?php
include 'verifica.php';
include 'conexao.php';

if (isset($_GET['cod'])) {
    $cod = $_GET['cod'];
    
    $banco = abrirBanco();
    
    // Lógica de exclusão
    $sql = "DELETE FROM livros WHERE cod = $cod";
    
    if ($banco->query($sql) === TRUE) {
        echo "Livro excluído com sucesso!<br><a href='index.php'>Voltar para a lista</a>";
    } else {
        echo "Erro ao excluir: " . $banco->error;
    }
    
    $banco->close();
} else {
    echo "Código do livro não fornecido.";
}
?>