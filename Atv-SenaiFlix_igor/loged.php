<?php


if (!isset($_SESSION["nome"])) {
    // Redireciona para o login se o usuário não estiver logado
    header("Location: indexX.php");
    exit();
}

// Inclui a conexão com o banco de dados
include ('config.php');

// Consulta SQL para obter informações do usuário
$nome = $_SESSION["nome"];
$sql = "SELECT nome, usuario, email, data_cadastro FROM usuarios WHERE nome = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die('Erro ao preparar a consulta: ' . $conn->error);
}

// Bind do parâmetro
$stmt->bind_param("s", $nome);

// Executa a consulta
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($db_nome, $db_usuario, $db_email, $db_data_cadastro);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Restrita</title>
     
     <link rel="stylesheet" href="css/loged.css">
    
</head>
<body>
    <div class="content">
        <h1>Bem-vindo, <?php echo htmlspecialchars($db_nome); ?>!</h1>
        <p><strong>Usuário:</strong> <?php echo htmlspecialchars($db_usuario); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($db_email); ?></p>
        <p><strong>Data de Cadastro:</strong> <?php echo htmlspecialchars($db_data_cadastro); ?></p>
        
    </div>
</body>
</html>
