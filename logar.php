<?php
session_start();
// **ADICIONE A VERIFICAÇÃO DE POST PARA EVITAR WARNINGS**
if (!isset($_POST['login']) || !isset($_POST['senha'])) {
    // Redireciona ou mostra uma mensagem se os dados não foram enviados
    header('location:login.php'); 
    exit;
}

$login = $_POST['login'];
$senha = $_POST['senha'];

// **MELHORIA DE SEGURANÇA: SANITIZAÇÃO (IMPORTANTE!)**
// Esta é uma melhoria vital, mas para a correção do seu bug, 
// o foco é a linha 7 e a linha 12.

$conexao = new mysqli("localhost", "root", "", "livraria");

// **VERIFICAÇÃO DE CONEXÃO (Boa prática)**
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// **SQL INSEGURO! Use Prepared Statements (futura melhoria)**
$sql = "SELECT * FROM usuarios WHERE login='$login' AND senha='$senha'";
$resultado = $conexao->query($sql);


// **CORREÇÃO AQUI: Troca de mysqli_num_rows() por $resultado->num_rows**
if($resultado->num_rows > 0){
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    header('location:index.php');
}else{
    echo "Login/senha inválidos<br>";
    echo "<button><a href='login.php'>Voltar</a></button>";
}
// Fechar a conexão ao final
$conexao->close();
?>