<?php
session_start();
include ('config.php'); // Inclui a conexão com o banco de dados

if (isset($_POST["nome"]) && isset($_POST["password"]) && !isset($_SESSION["nome"])) {
    // Captura as entradas do formulário
    $nome = $_POST["nome"];
    $senha = $_POST["password"];

    // Prepara a consulta SQL para buscar o usuário
    $sql = "SELECT nome, senha FROM usuarios WHERE nome = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die('Erro ao preparar a consulta: ' . $conn->error);
    }

    // Bind do parâmetro
    $stmt->bind_param("s", $nome);

    // Executa a consulta
    $stmt->execute();
    $stmt->store_result();

    // Verifica se o usuário foi encontrado
    if ($stmt->num_rows > 0) {
        // Bind do resultado
        $stmt->bind_result($db_nome, $db_senha);
        $stmt->fetch();

        // Verifica a senha
        if ($senha === $db_senha) {
            $_SESSION["nome"] = $db_nome;
            header("Location: indexX.php?pagina=loged");
            exit();
        }
    }

    // Se a autenticação falhar
    $stmt->close();
    header("Location: login.php?failed=true");
    exit();
}

// Se já estiver logado, redireciona para deslog.php
if (isset($_SESSION["nome"])) {
    header("Location: indexX.php?pagina=loged");
    exit();
}
?>
