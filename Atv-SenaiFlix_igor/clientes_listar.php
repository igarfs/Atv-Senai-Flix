<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista clientes</title>
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

    <h1>Listagem Clientes</h1>
    <table border = '1' widht = '80%'>
        <tr> 
            <th>ID</th>
          
            <th>Nome</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Estado</th>
            <th>Editar</th>
            <th>Remover</th>
        </tr>
<?php
include ('config.php');
$sql = "SELECT * FROM  clientes ";
$resultado =$conn->query($sql);
while ($linha= $resultado->fetch_assoc()){
?>  
<tr>
    <td><?php echo $linha['id']; ?></td>
    
    <td><?php echo $linha['nome']; ?></td>
    <td><?php echo $linha['email']; ?></td>
    <td><?php echo $linha['cpf']; ?></td>
    <td><?php echo $linha['estado']; ?></td>
    <td> <a href = "clientes_edita.php?id=<?php echo $linha['id']; ?>">Editar</a></td>
    <td> <a href = "clientes_remover.php?id=<?php echo $linha['id']; ?>">Remover</a></td>


</tr>
<?php
}
?>
</table>
<a class="nav-link btn" href="indexX.php?pagina=clientes_cadastro">Adicionar</a>

</body>
</html>