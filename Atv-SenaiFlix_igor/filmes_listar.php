<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista filmes</title>
    <style>
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h1>Listagem filmes</h1>
    <table border = '1' widht = '80%'>
        <tr> 
            <th>ID</th>
          
            <th>titulo</th>
            <th>capa</th>
            <th>descricao</th>
            <th>ano_lancamento</th>
            <th>genero</th>
            <th>classificacao</th>
            <th>Editar</th>
            <th>Remover</th>
        </tr>
<?php
include ('config.php');
$sql = "SELECT * FROM  filmes ";
$resultado =$conn->query($sql);
while ($linha= $resultado->fetch_assoc()){
?>  
<tr>
    <td><?php echo $linha['id']; ?></td>
    
    <td><?php echo $linha['titulo']; ?></td>
    <td><img src='uploads/<?php echo $linha['foto']; ?>' width='100px' height='100px'></td>
    <td><?php echo $linha['descricao']; ?></td>
    <td><?php echo $linha['ano_lancamento']; ?></td>
    <td><?php echo $linha['genero']; ?></td>
    <td><?php echo $linha['classificacao']; ?></td>
    <td><a href="indexX.php?pagina=filmes_edita&id=<?php echo $linha['id']; ?>">Editar</a></td>
    <td> <a href = "filmes_remover.php?id=<?php echo $linha['id']; ?>">Remover</a></td>


</tr>
<?php
}
?>
</table>
<a class="nav-link btn" href="indexX.php?pagina=filmes_cadastro">Adicionar</a>
</body>
</html>