<?php
// editarLivro.php
include 'verifica.php'; // Inclui a verificação de login
include 'conexao.php'; // Inclui as funções de banco de dados

$cod = null;
$livro = null;
$mensagem = '';

// --- LÓGICA DE PROCESSAMENTO (QUANDO O FORMULÁRIO É SUBMETIDO) ---
if (isset($_POST['acao']) && $_POST['acao'] == 'atualizar') {
    $cod = $_POST['cod'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];

    // 1. Validação simples
    if (empty($cod) || empty($titulo) || empty($autor) || empty($ano)) {
        $mensagem = "<p style='color: red;'>Por favor, preencha todos os campos.</p>";
    } else {
        $banco = abrirBanco();
        
        // 2. Consulta de Atualização (UPDATE)
        // NOTA: Para segurança, use prepared statements em produção!
        $sql = "UPDATE livros SET titulo = '$titulo', autor = '$autor', ano = '$ano' 
                WHERE cod = $cod";
        
        if ($banco->query($sql) === TRUE) {
            $mensagem = "<p style='color: green;'>Livro '$titulo' atualizado com sucesso!</p>";
            
            // Recarrega os dados do livro após a atualização para que o formulário reflita a mudança
            $sql_select = "SELECT * FROM livros WHERE cod = $cod";
            $resultado_select = $banco->query($sql_select);
            $livro = $resultado_select->fetch_assoc();
            
        } else {
            $mensagem = "<p style='color: red;'>Erro ao atualizar livro: " . $banco->error . "</p>";
        }
        $banco->close();
    }
}

// --- LÓGICA DE EXIBIÇÃO DO FORMULÁRIO (QUANDO ACESSADO PELA INDEX) ---
if (isset($_GET['cod']) && !isset($_POST['acao'])) {
    $cod = $_GET['cod'];
} elseif (isset($_POST['cod'])) {
    // Se houve um erro de processamento, usamos o 'cod' do POST para recarregar.
    $cod = $_POST['cod'];
}

// Se temos um código, buscamos o livro no banco de dados para preencher o formulário
if ($cod !== null) {
    $banco = abrirBanco();
    $sql = "SELECT * FROM livros WHERE cod = $cod";
    $resultado = $banco->query($sql);
    
    if ($resultado->num_rows > 0) {
        // Se a variável $livro não foi definida na seção POST, defina-a aqui.
        if ($livro === null) {
            $livro = $resultado->fetch_assoc();
        }
    } else {
        $mensagem = "<p style='color: red;'>Livro não encontrado!</p>";
    }
    $banco->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="css/style.css">
<meta charset="UTF-8">
<title>Editar Livro</title>
</head>
<body>
<h1>Editar Livro</h1>

<?php 
// Exibe a mensagem de sucesso ou erro
echo $mensagem; 
?>

<?php if ($livro !== null): ?>
    <form action="editarLivro.php" method="POST">
        
        <input type="hidden" name="cod" value="<?php echo htmlspecialchars($livro['cod']); ?>">
        <input type="hidden" name="acao" value="atualizar">

        <label for="titulo">Título:</label><br>
        <input type="text" name="titulo" id="titulo" 
               value="<?php echo htmlspecialchars($livro['titulo']); ?>" required><br>

        <label for="autor">Autor:</label><br>
        <input type="text" name="autor" id="autor" 
               value="<?php echo htmlspecialchars($livro['autor']); ?>" required><br>

        <label for="ano">Ano:</label><br>
        <input type="text" name="ano" id="ano" 
               value="<?php echo htmlspecialchars($livro['ano']); ?>" required><br>
        
        <br>
        <input type="submit" value="Salvar Alterações">
    </form>
    <br>
    <a href='index.php'><button type='button'>Voltar</button></a>
<?php elseif ($cod === null): ?>
    <p>Nenhum código de livro foi fornecido para edição.</p>
    <a href='index.php'><button type='button'>Voltar</button></a>
<?php endif; ?>

</body>
</html>