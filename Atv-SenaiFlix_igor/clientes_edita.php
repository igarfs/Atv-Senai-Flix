<!DOCTYPE html>

<?php
include ('config.php');

$id = $_GET['id'];
$query = "SELECT * FROM clientes WHERE id= '$id'";
$resultado = $conn->query($query);
$linha = $resultado->fetch_assoc();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
</head>
<body>
    <h1>Formulário de Cadastro:</h1>
    <form action="clientes_edita_salvar.php" method="post" enctype="multipart/form-data">
        Nome: <input type="text" name="nome" value="<?php echo $linha['nome']; ?>"><br><br>
        CEP: <input type="text" name="cep" value="<?php echo $linha['cep']; ?>"><br><br>
        endereço: <input type="text" name="endereco" value="<?php echo $linha['endereco']; ?>"><br><br>
        Bairro: <input type="text" name="bairro" value="<?php echo $linha['bairro']; ?>"><br><br>
        Cidade: <input type="text" name="cidade" value="<?php echo $linha['cidade']; ?>"><br><br>
        Estado: <input type="text" name="estado" value="<?php echo $linha['estado']; ?>"><br><br>
        CPF: <input type="text" name="cpf" value="<?php echo $linha['cpf']; ?>"><br><br>
        Email: <input type="text" name="email" value="<?php echo $linha['email']; ?>"><br><br>
        telefone: <input type="text" name="telefone" value="<?php echo $linha['telefone']; ?>"><br><br>
      
        <input type="submit" value="Editar">
    </form>

</body>
</html>
