<?php
session_start();
include ('config.php');

// Verifica se o cliente está logado e se a sessão contém o nome do usuário
if (!isset($_SESSION['nome'])) {
    die('Usuário não está logado.');
}

// Recebe e valida o id_cliente via POST
$id_cliente = filter_input(INPUT_POST, 'id_cliente', FILTER_VALIDATE_INT);
if ($id_cliente === false) {
    die('ID do cliente inválido.');
}

// Recebe e sanitiza o plano via POST
$plano = trim($_POST['plano']);
if (empty($plano)) {
    die('Plano não pode estar vazio.');
}
$plano = htmlspecialchars($plano, ENT_QUOTES, 'UTF-8');

// Obtém a data e hora atuais
$data_inicio = date("Y-m-d H:i:s");

// Cria um objeto DateTime para manipulação de datas
$dateTime = new DateTime($data_inicio);
$dateTime->modify('+30 days');

// Formata a data final como string
$data_fim = $dateTime->format('Y-m-d H:i:s');

// Define a data de cadastro e atualização como a data atual
$data_cadastro = $data_inicio;
$data_atualizacao = $data_cadastro;

// Define o status como ativo ('1')
$status = '1';

// Preparar a consulta SQL usando prepared statement
$sql = "INSERT INTO assinaturas (id_cliente, plano, data_inicio, data_fim, data_cadastro, data_atualizacao, status) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die('Erro ao preparar a consulta para assinaturas: ' . $conn->error);
}

// Bind dos parâmetros
$stmt->bind_param("issssss", $id_cliente, $plano, $data_inicio, $data_fim, $data_cadastro, $data_atualizacao, $status);

// Executar a consulta
if ($stmt->execute()) {
    header("Location: indexX.php?pagina=assinaturas_listar");
    exit();
} else {
    echo "Erro ao inserir registro: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
