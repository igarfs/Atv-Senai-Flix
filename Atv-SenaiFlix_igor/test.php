<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro e Login</title>
    <style>
    
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .form-container h2 {
            margin-bottom: 20px;
        }
        .form-container input[type="text"],
        .form-container input[type="password"],
        .form-container input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        .form-container input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .form-toggle {
            cursor: pointer;
            color: #007bff;
            text-decoration: underline;
        }
        .form-toggle:hover {
            color: #0056b3;
        }
    </style>
    <script>
        function toggleForms() {
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');
            const toggleLink = document.getElementById('toggle-link');

            if (loginForm.style.display === 'none') {
                loginForm.style.display = 'block';
                registerForm.style.display = 'none';
                toggleLink.textContent = 'Não tem uma conta? Cadastre-se aqui';
            } else {
                loginForm.style.display = 'none';
                registerForm.style.display = 'block';
                toggleLink.textContent = 'Já tem uma conta? Faça login aqui';
            }
        }
    </script>
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <form id="login-form" action="login.php" method="POST" style="display: block;">
            <label for="login-nome">Nome:</label>
            <input type="text" id="login-nome" name="nome" required>

            <label for="login-password">Senha:</label>
            <input type="password" id="login-password" name="password" required>

            <input type="submit" value="Entrar">
        </form>

        <h2>Cadastro</h2>
        <form id="register-form" action="registrar.php" method="POST" style="display: none;">
            <label for="register-nome">Nome:</label>
            <input type="text" id="register-nome" name="nome" required>

            <label for="register-usuario">Usuário:</label>
            <input type="text" id="register-usuario" name="usuario" required>

            <label for="register-password">Senha:</label>
            <input type="password" id="register-password" name="senha" required>

            <label for="register-email">Email:</label>
            <input type="email" id="register-email" name="email" required>

            <input type="submit" value="Cadastrar">
        </form>

        <p id="toggle-link" class="form-toggle" onclick="toggleForms()">Não tem uma conta? Cadastre-se aqui</p>
    </div>
</body>
</html>
