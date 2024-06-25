<?php
include ('config.php');

$plano = $_POST['plano'];
$id_cliente = $_POST['id_cliente'];


$sql = "UPDATE assinaturas SET plano = '$plano', id_cliente = '$id_cliente', data_atualizacao = '$data_atualizacao', status = '$status'";

if ($conn->query($sql) === TRUE) {
    header("Location: indexX.php?pagina=assinaturas_listar");
    exit();
} else {
    echo "Erro ao atualizar registro: " . $conn->error;
}

$conn->close(); // Fecha a conexão com o banco de dados

?>