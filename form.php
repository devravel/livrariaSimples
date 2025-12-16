<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Cadastrar Usuário</title>
</head>
<body>
<h2>Cadastro de Usuário</h2>
<form action="cadastrarUsuario.php" method="POST">
<label>Nome:</label><br>
<input type="text" name="nome" required><br>
<label>Login:</label><br>
<input type="text" name="login" required><br>
<label>Senha:</label><br>
<input type="password" name="senha" required><br>
<input type="hidden" name="acao" value="inserir"><br>
<input type="submit" value="Cadastrar">
<br><br><a href='login.php'><button type='button'>Já tenho cadastro</button></a>
</form>
</body>
</html>