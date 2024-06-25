<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Site</title>
    <!-- Inclua o Bootstrap CSS -->

    <style>
        .navbar {
            position: relative;
         
            display: flex;
         
            flex-wrap: wrap;
           
            align-items: center;
           
            padding: .5rem 1rem;
            flex-direction: column;
        }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Meu Site</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="indexX.php?pagina=home1">Home</a>
                    </li>
               
                        <?php
                        session_start();
                        if (isset($_SESSION["nome"])) {
                            // Usuário está logado
                            echo '<a class="nav-link" href="indexX.php?pagina=clientes_listar">Clientes</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="indexX.php?pagina=filmes_listar">Filmes</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="indexX.php?pagina=assinaturas_listar">Assinaturas</a>
                          </li>
                          <li class="nav-item">
                          <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                          </li>';
                        } else {
                            // Usuário não está logado
                            echo '<li class="nav-item">
                            <a class="nav-link" href="indexX.php?pagina=test">Login</a>
                          </li>';
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </nav>
    </header>



</body>

</html>