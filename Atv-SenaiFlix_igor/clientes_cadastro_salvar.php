<?php
include ('config.php');

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$data_cadastro = date("Y-m-d H:i:s");
$data_atualizacao = $data_cadastro;
$status = '1';

// Preparar a consulta SQL usando prepared statement
$sql = "INSERT INTO clientes (nome, cpf, endereco, bairro, cidade, estado, cep, email, telefone, data_cadastro, data_atualizacao, status) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die('Erro ao preparar a consulta: ' . $conn->error);
}

// Bind dos parâmetros
$stmt->bind_param("sssssssssssi", $nome, $cpf, $endereco, $bairro, $cidade, $estado, $cep, $email, $telefone, $data_cadastro, $data_atualizacao, $status);

// Executar a consulta
if ($stmt->execute()) {
    header("Location: indexX.php?pagina=clientes_listar");
    exit();
} else {
    echo "Erro ao inserir registro: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
