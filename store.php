<?php

include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $nome = $_POST['nome'];
    $ano = $_POST['email']; 
    $sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";

    // Executa a consulta e verifica se foi bem-sucedida
    if ($conn->query($sql) === TRUE) {
        header("Location: login.php"); // Redireciona para a página principal
    } else {
        echo "Erro: " . $conn->error; // Mostra erro, se houver
    }
}



?>