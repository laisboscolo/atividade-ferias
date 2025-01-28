<link rel="stylesheet" href="update.css">
<?php
include 'conexao.php'; // Inclui o arquivo de conexão

if (isset($_GET['id'])) { // Verifica se o ID foi passado
    $id = $_GET['id']; // Recebe o ID
    $sql = "SELECT * FROM usuarios WHERE id=$id"; // Consulta o usuário
    $result = $conn->query($sql); // Executa a consulta
    $usuarios = $result->fetch_assoc(); // Obtém os dados do usuário
}

// Se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome']; // Recebe o novo nome
    $email = $_POST['email'];
    $sql = "UPDATE usuarios SET nome='$nome', email='$email' WHERE id=$id"; // Prepara a atualização

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php"); // Redireciona se a atualização for bem-sucedida
    } else {
        echo "Erro: " . $conn->error; // Mostra erro, se houver
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atualizar perfil</title>
</head>
<body>
    <h1>Atualização de cadastro de usuário:</h1>
    <form action="" method="POST">
        <label>Nome de usuário:</label>
        <input type="text" name="nome" value="<?php echo $usuarios['nome']; ?>" required>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $usuarios['email']; ?>" required>
        <br>
        <input type="submit" value="Atualizar">
    </form>
    <a href="login.php">Cancelar</a> <!-- Link para voltar -->


</body>
</html>