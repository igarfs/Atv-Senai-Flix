<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        body {
            width: 50%;
            margin: auto;
            background-color: #f0f0f0;
            padding: 20px;
            text-align: center;
        }
        h1 {
            text-align: center;
            font-size: 25px;
        }
    </style>
</head>
<body>
    <h1>Formulário de Cadastro:</h1>
    <hr>
    <form action="filmes_cadastro_salvar.php" method="post" enctype="multipart/form-data">
        <label for="titulo">Titulo</label><br>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="descricao">Descrição</label><br>
        <input type="text" id="descricao" name="descricao" required><br><br>

        <label for="ano_lancamento">Ano de Lançamento</label><br>
        <input type="text" id="ano_lancamento" name="ano_lancamento" required><br><br>

        <label for="genero">Gênero</label><br>
        <input type="text" id="genero" name="genero" required><br><br>

        <label for="classificacao">Classificação</label><br>
        <input type="text" id="classificacao" name="classificacao" required><br><br>

    

        <label for="foto">Capa</label><br>
        <input type="file" id="foto" name="foto" required><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
