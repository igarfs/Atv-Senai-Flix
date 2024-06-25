<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes - Minha Página</title>

    <style>
        /* Estilos adicionais conforme necessário */
        .filme-card {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .filme-card img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
    </style>
</head>
<body>


    <div class="container mt-5">
        <div class="row">
            <?php
            // Incluir arquivo de configuração do banco de dados
            include 'config.php';

            // Consulta para selecionar filmes ativos ordenados pela data de cadastro (ou outra lógica desejada)
            $sql = "SELECT * FROM filmes WHERE status = '1' ORDER BY data_cadastro DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Loop através dos resultados do banco de dados
                while($row = $result->fetch_assoc()) {
                    // Variáveis para armazenar dados do filme
                    $titulo = $row['titulo'];
                    $descricao = $row['descricao'];
                    $ano_lancamento = $row['ano_lancamento'];
                    $genero = $row['genero'];
                    $classificacao = $row['classificacao'];
                    $foto = $row['foto'];

                    // Exibir cada filme como um card
                    echo "<div class='col-md-4'>
                            <div class='filme-card'>
                                <img src='uploads/$foto' alt='$titulo'>
                                
                                <h3>$titulo</h3>
                                <p><strong>Gênero:</strong> $genero</p>
                                <p><strong>Ano de Lançamento:</strong> $ano_lancamento</p>
                                <p><strong>Classificação:</strong> $classificacao</p>
                                <p>$descricao</p>
                            </div>
                        </div>";
                }
            } else {
                echo "<div class='col'>
                        <div class='alert alert-warning'>Nenhum filme encontrado.</div>
                    </div>";
            }

            // Fechar conexão com o banco de dados
            $conn->close();
            ?>
        </div>
    </div>

    <!-- Inclui o rodapé -->
    <?php // include 'footer.php'; ?>

    <!-- Scripts JavaScript do Bootstrap -->

</body>
</html>
