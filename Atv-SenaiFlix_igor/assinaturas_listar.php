<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista assinaturas</title>
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

    <h1>Listagem assinaturas</h1>
    <table border = '1' widht = '80%'>
        <tr> 
            <th>ID</th>
          
            <th>cliente</th>
            <th>plano</th>
            <th>inicio</th>
            <th>vencimento</th>
            
            <th>Editar</th>
            <th>Remover</th>
        </tr>
<?php
include ('config.php');
$sql = "SELECT * FROM  assinaturas ";
$resultado =$conn->query($sql);
while ($linha= $resultado->fetch_assoc()){
?>  
<tr>
    <td><?php echo $linha['id']; ?></td>
    
    <td><?php echo $linha['id_cliente']; ?></td>
    <td><?php echo $linha['plano']; ?></td>
    <td><?php echo $linha['data_inicio']; ?></td>
    <td><?php echo $linha['data_fim']; ?></td>
    <td> <a href = "assinaturas_edita.php?id=<?php echo $linha['id']; ?>">Editar</a></td>
    <td> <a href = "assinaturas_remover.php?id=<?php echo $linha['id']; ?>">Remover</a></td>


</tr>
<?php
}
?>
</table>
<a class="nav-link btn" href="indexX.php?pagina=assinaturas_cadastro">Adicionar</a>
</body>
</html>