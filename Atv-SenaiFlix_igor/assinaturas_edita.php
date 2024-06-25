<!DOCTYPE html>

<?php
include ('config.php');

$id = $_GET['id'];
$query = "SELECT * FROM assinaturas WHERE id= '$id'";
$resultado = $conn->query($query);
$linha = $resultado->fetch_assoc();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de edição</title>
</head>
<body>
    <h1>Formulário de edição:</h1>
    <form action="assinaturas_edita_salvar.php" method="post" enctype="multipart/form-data">
        plano: <input type="text" name="plano" value="<?php echo $linha['plano']; ?>"><br><br>
        id do cliente: <input type="text" name="id_cliente" value="<?php echo $linha['id_cliente']; ?>"><br><br>

      
        <input type="submit" value="Editar">
    </form>

</body>
</html>
