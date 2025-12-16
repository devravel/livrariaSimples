<?php
function abrirBanco() {
    $conexao = new mysqli("localhost", "root", "", "livraria");
    if ($conexao->connect_error) {
        // Usa o die() para abortar a execução em caso de erro fatal de BD
        die("Falha na conexão: " . $conexao->connect_error);
    } else {
        return $conexao;
    }
}

// Função para selecionar todos os livros (útil para a index.php)
function selectLivros() {
    $banco = abrirBanco();
    $sql = "SELECT * FROM livros";
    $resultado = $banco->query($sql);
    $banco->close();
    
    // Retorna o objeto mysqli_result (pode ser iterado)
    return $resultado; 
}
?>