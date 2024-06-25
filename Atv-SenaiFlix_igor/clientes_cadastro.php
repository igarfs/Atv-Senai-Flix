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
    <form action="clientes_cadastro_salvar.php" method="post" enctype="multipart/form-data">

        <label for="nome">Nome</label><br>
        <input type="text" name="nome"><br><br>

        <label for="cpf">CPF</label><br>
        <input type="text" name="cpf"><br><br>

        <label for="endereco">endereço</label><br>
        <input type="text" name="endereco"><br><br>

        <div class="form-group">
            <label for="cep">CEP</label><br>
            <input type="text" class="form-control cep" id="cep" name="cep" placeholder="Digite o CEP"><br><br>
        </div>
       
        <div class="form-group">
            <label for="bairro">Bairro</label><br>
            <input type="text" class="form-control cep-bairro" id="bairro" name="bairro" placeholder="Bairro"><br><br>
        </div>

        <div class="form-group">
            <label for="cidade">Cidade</label><br>
            <input type="text" class="form-control cep-cidade" id="cidade" name="cidade" placeholder="Cidade"><br><br>
        </div>

        <div class="form-group">
            <label for="estado">Estado</label><br>
            <input type="text" class="form-control cep-estado" id="estado" name="estado" placeholder="Estado"><br><br>
        </div>

        <label for="Email">Email</label><br>
        <input type="text" name="email"><br><br>

        <label for="telefone">telefone</label><br>
        <input type="text" name="telefone"><br><br>


        <input type="submit" value="Enviar">
    </form>
    <script>
    $(document).ready(function() {
        // Função para limpar os campos do formulário
        function limpaFormularioCEP() {
            $(".cep-logradouro").val(""); // Limpa o campo logradouro
            $(".cep-bairro").val(""); // Limpa o campo bairro
            $(".cep-cidade").val(""); // Limpa o campo cidade
            $(".cep-estado").val(""); // Limpa o campo estado
        }
        
        // Evento "blur" para detectar quando o usuário termina de digitar o CEP
        $("#cep").blur(function() {
            var cep = $(this).val().replace(/\D/g, ''); // Remove qualquer caractere não numérico do CEP
            if (cep !== "") {
                var validacep = /^[0-9]{8}$/; // Expressão regular para validar o formato do CEP
                if(validacep.test(cep)) {
                    // Preenche os campos com "..." enquanto a busca está sendo realizada
                    $(".cep-logradouro").val("...");
                    $(".cep-bairro").val("...");
                    $(".cep-cidade").val("...");
                    $(".cep-estado").val("...");
                    
                    // Faz a requisição para a API ViaCEP
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
                        if (!("erro" in dados)) {
                            // Atualiza os campos do formulário com os dados recebidos
                            $(".cep-logradouro").val(dados.logradouro);
                            $(".cep-bairro").val(dados.bairro);
                            $(".cep-cidade").val(dados.localidade);
                            $(".cep-estado").val(dados.uf);
                        } else {
                            // CEP não encontrado
                            limpaFormularioCEP();
                            alert("CEP não encontrado.");
                        }
                    });
                } else {
                    // CEP em formato inválido
                    limpaFormularioCEP();
                    alert("Formato de CEP inválido.");
                }
            } else {
                // CEP sem valor, limpa formulário
                limpaFormularioCEP();
            }
        });
    });
</script>

</body>
</html>
