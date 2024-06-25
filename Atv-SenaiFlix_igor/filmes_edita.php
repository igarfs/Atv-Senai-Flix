<!DOCTYPE html>

<?php
include ('config.php');

$id = $_GET['id'];
$query = "SELECT * FROM filmes WHERE id= '$id'";
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
    <form action="filmes_edita_salvar.php" method="post" enctype="multipart/form-data">
        Titulo: <input type="text" name="titulo" value="<?php echo $linha['titulo']; ?>"><br><br>
        capa:<br><td><img src='uploads/<?php echo $linha['foto']; ?>' width='100px' height='100px'></td><br> 
        <input type="file" name="foto" value="<?php echo $linha['foto']; ?>"><br><br>
        descrição: <input type="text" name="descricao" value="<?php echo $linha['descricao']; ?>"><br><br>
        lançamento: <input type="text" name="ano_lancamento" value="<?php echo $linha['ano_lancamento']; ?>"><br><br>
        genero: <input type="text" name="genero" value="<?php echo $linha['genero']; ?>"><br><br>
        classificação: <input type="text" name="classificacao" value="<?php echo $linha['classificacao']; ?>"><br><br>
 
 
      
        <input type="submit" value="Editar">
    </form>

</body>
</html>
