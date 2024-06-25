<?php
include ('config.php');
// Recuperar dados do formulário com sanitização básica
$titulo = strip_tags($_POST['titulo']);
$descricao = strip_tags($_POST['descricao']);
$ano_lancamento = strip_tags($_POST['ano_lancamento']);
$genero = strip_tags($_POST['genero']);
$classificacao = strip_tags($_POST['classificacao']);

// Dados adicionais
$data_cadastro = date("Y-m-d H:i:s");
$data_atualizacao = $data_cadastro;

// Gerenciamento do arquivo
$diretorio_destino = "uploads/";
$nome_arquivo = uniqid() . '_' . basename($_FILES["foto"]["name"]);
$caminho_arquivo = $diretorio_destino . $nome_arquivo;

$extensao = strtolower(pathinfo($nome_arquivo, PATHINFO_EXTENSION));
$extensoes_permitidas = array("jpg", "jpeg", "png");

// Verificar tipo e tamanho do arquivo
$tamanho_maximo = 5 * 1024 * 1024; // 5MB
if ($_FILES["foto"]["size"] > $tamanho_maximo) {
    echo "O arquivo deve ter no máximo 5MB.";
    exit;
}

if (!in_array($extensao, $extensoes_permitidas)) {
    echo "Somente arquivos JPG, JPEG, PNG são permitidos.";
    exit;
}

if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $caminho_arquivo)) {
    echo "Erro ao enviar o arquivo.";
    exit;
}

$sql = "UPDATE filmes SET titulo = '$titulo', descricao = '$descricao', ano_lancamento = '$ano_lancamento', genero = '$genero', classificacao = '$classificacao', data_atualizacao = '$data_atualizacao', foto = '$nome_arquivo'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Registro atualizado com sucesso!');</script>";
} else {
    echo "<script>alert('Erro ao atualizar registro: " . $conn->error . "');</script>";
}
header ('location: indexX.php?pagina=filmes_listar');

$conn->close(); // Fecha a conexão com o banco de dados

?>