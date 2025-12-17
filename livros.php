<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="css/style.css">
<meta charset="UTF-8">
<title>Cadastrar Livro</title>
</head>
<body>
<h2>Cadastro de Livro</h2>
<form action="cadastrarLivro.php" method="POST">
<label>Título:</label><br>
<input type="text" name="titulo" required><br>
<label>Autor:</label><br>
<input type="text" name="autor" required><br>
<label>Ano:</label><br>
<input type="text" name="ano" required><br>
<input type="hidden" name="acao" value="inserir">
<input type="submit" value="Salvar">
</form>
<a href='index.php'><button type='button'>Voltar</button></a>

</body>
</html>