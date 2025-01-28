<?php
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']); // Aplica md5 no email/senha

    // Inserir o novo usuário no banco de dados
    $sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";
    if ($conn->query($sql) === TRUE) {
        header('Location:index.php');
    } else {
        echo "Erro ao cadastrar usuário: " . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css">
    <title>Login</title>
</head>
<body>
<h1>Gerenciamento de Usuário</h1>
    <form action="" method="POST">
        <label for="nome">Nome do Usuário:</label>
        <input type="text" name="nome" id="nome" placeholder="Insira o nome do usuário" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Insira o email" required>
        <br>
        <input type="submit" value="Entrar">
    </form>
    <?php if (isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>
</body>
</html>
