<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="images/brasao.png" type="image/x-icon">
    <title> Login - Prefeitura Municipal de Cerro Grande do Sul</title>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const pessoaFisicaRadio = document.getElementById('pessoaFisica');
            const pessoaJuridicaRadio = document.getElementById('pessoaJuridica');
            const documentoInput = document.getElementById('documento');

            pessoaFisicaRadio.addEventListener('click', function () {
                documentoInput.placeholder = 'CPF';
            });

            pessoaJuridicaRadio.addEventListener('click', function () {
                documentoInput.placeholder = 'CNPJ';
            });
        });

    </script>
</head>

<body>
    <div class="bg-container">
        <div class="login-box">
            <div class="login-content">
                <div class="left-side">
                    <div class="logo">

                        <h2><span>
                                <div class="custom-text first-line"><b>Prefeitura Municipal de</b></div>
                                <div class="custom-text second-line"><b>Cerro Grande do Sul</b></div>
                            </span></h2>
                        <img src="images/brasao.png">

                    </div>
                </div>

                <div class="right-side">
                    <h2 style="color: #333;">Acesso Restrito</h2>
                    <hr style="border-color: #ccc;">
                    <div class="input-group">
                        <div class="radio-group">
                            <input type="radio" id="pessoaFisica" name="tipoPessoa" value="fisica" checked>
                            <label for="pessoaFisica">Pessoa Física</label>
                            <input type="radio" id="pessoaJuridica" name="tipoPessoa" value="juridica">
                            <label for="pessoaJuridica">Pessoa Jurídica</label>
                        </div>
                    </div>
                    <form action="{{route ('validaLogin')}}" method="post">
                        @csrf
                        <div class="input-group">
                            <input type="text" id="documento" name="cpfCnpj" placeholder="CPF">
                        </div>
                        <div class="input-group">
                            <input type="password" id="senha" name="senha" placeholder="Senha">
                        </div>
                        <button type="submit">Entrar</button>
                    </form>
                    <div class="links">
                        <a href="#" style="text-decoration: none; color: #007bff;">Esqueci a Senha</a>
                        <a href="/cadastroLogin" style="text-decoration: none; color: #007bff;">Cadastrar-se</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>