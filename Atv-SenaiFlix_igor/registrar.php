<?php
include ('config.php');

$nome   = $_POST['nome'];
$usuario = $_POST['usuario'];
$senha  = $_POST['senha'];
$email  = $_POST['email'];

$data_cadastro = date("Y-m-d H:i:s");
$data_atualizacao = $data_cadastro;
$status = '1';

// Preparar a consulta SQL usando prepared statement
$sql = "INSERT INTO usuarios (nome, usuario, senha, email, data_cadastro, data_atualizacao, status) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die('Erro ao preparar a consulta: ' . $conn->error);
}

// Bind dos parâmetros
$stmt->bind_param("sssssss", $nome, $usuario, $senha, $email, $data_cadastro, $data_atualizacao, $status);

// Executar a consulta
if ($stmt->execute()) {
    echo "<h1>Cadastro realizado com sucesso!</h1>";
} else {
    echo "Erro ao inserir registro: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
