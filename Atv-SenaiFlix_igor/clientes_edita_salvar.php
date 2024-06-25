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

$sql = "UPDATE clientes SET nome = '$nome', cpf = '$cpf', endereco = '$endereco', bairro = '$bairro', cidade = '$cidade', estado = '$estado', cep = '$cep', email = '$email', telefone = '$telefone', data_atualizacao = '$data_atualizacao', status = '$status'";

if ($conn->query($sql) === TRUE) {
    echo "Registro atualizado com sucesso!";
} else {
    echo "Erro ao atualizar registro: " . $conn->error;
}

$conn->close(); // Fecha a conexão com o banco de dados

?>