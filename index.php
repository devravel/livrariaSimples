<?php
include 'conexao.php'; 
include 'verifica.php'; 
$livros = selectLivros(); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="css/style.css">
<meta charset="UTF-8">
<title>Livraria</title>
<style>
    table, th, td { border: 1px solid black; border-collapse: collapse; padding: 8px; }
</style>
</head>
<body>
<h1>Livraria</h1>
<div>
<p>Bem-vindo, <?php echo $logado; ?>!</p> <a href='livros.php'><button type='button'>Cadastrar Livro</button></a>
<a href='logout.php'><button type='button' style="background-color: red;">Sair</button></a>
</div>
<div>
<h2>Livros Cadastrados</h2>
<?php if ($livros->num_rows > 0): ?>
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Ano</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $livros->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['titulo']); ?></td>
                <td><?php echo htmlspecialchars($row['autor']); ?></td>
                <td><?php echo htmlspecialchars($row['ano']); ?></td>
                <td>
                    <a href='editarLivro.php?cod=<?php echo $row['cod']; ?>'><button type='button' style="background-color: blue;">Editar</button></a>
                    <a href='excluirLivro.php?cod=<?php echo $row['cod']; ?>'><button type='button' style="background-color: red;">Excluir</button></a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    </div>
<?php else: ?>
    <p>Nenhum livro cadastrado.</p>
<?php endif; ?>

</body>
</html>