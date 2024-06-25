<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        body{
            background-color:  #e6ffff; 
            width: 50%; /* largura da div */
            margin: auto; /* centraliza horizontalmente */
            background-color: #f0f0f0; /* cor de fundo opcional */
            padding: 20px; /* espaçamento interno opcional */
            text-align: center; /* alinha texto no centro */
        }

        h1{
            text-align: center;
            font-size: 25px;
        }
       

    </style>
</head>
<body>
    <h1>Formulário de Cadastro:</h1>
    <hr>
    <h2></h2>
    <form action="assinaturas_cadastro_salvar.php" method="post" enctype="multipart/form-data">

        <label for="plano">plano</label><br>
        <input type="text" name="plano"><br><br>
        <label for="id_cliente">id do cliente</label><br>
        <input type="text" name="id_cliente"><br><br>




        <input type="submit" value="assinar">
    </form>
 
</body>
</html>
