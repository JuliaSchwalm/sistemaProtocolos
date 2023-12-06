<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro-login.css">
    <link rel="icon" href="images/brasao.png" type="image/x-icon">
    <title> Login - Prefeitura Municipal de Cerro Grande do Sul</title>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const pessoaFisicaRadio = document.getElementById('pessoaFisica');
    const pessoaJuridicaRadio = document.getElementById('pessoaJuridica');
    const documentoInput = document.getElementById('cpfCnpj');

    pessoaFisicaRadio.addEventListener('click', function() {
        documentoInput.placeholder = 'CPF';
    });

    pessoaJuridicaRadio.addEventListener('click', function() {
        documentoInput.placeholder = 'CNPJ';
    });
});

        </script>
</head>
<body>
    <div class="bg-container">
        <div class="login-box">
            <div class="login-content">
                <div class="right-side">
                    <h2 style="color: #333;">Cadastre-se</h2>
                    <hr style="border-color: #ccc;">
                    <div class="input-group">
                        <div class="radio-group">
                            <input type="radio" id="pessoaFisica" name="tipoPessoa" value="fisica" checked>
                            <label for="pessoaFisica">Pessoa Física</label>
                            <input type="radio" id="pessoaJuridica" name="tipoPessoa" value="juridica">
                            <label for="pessoaJuridica">Pessoa Jurídica</label>
                        </div>
                    </div>
                    <form action = "{{route ('formularioLogin')}}" method = "post">
                    @csrf
                    <div class="input-group">
                        <input type="text" id="cpfCnpj" name="cpfCnpj" placeholder = "CPF">
                    </div>
                    <div class="input-group">
                        <input type="password" id="senha" name="senha" placeholder = "Senha">
                    </div>
                    <button type="submit">Entrar</button>
                   
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


