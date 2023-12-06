<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/template.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">

    <link rel="icon" href="{{asset('images/brasao.png')}}" type="image/x-icon">
    <title>@yield('titulo')</title>
    <!-- Adicione este script ao seu HTML -->
    <script>
        // Fechar o dropdown se o usuário clicar fora dele
        window.onclick = function (event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.style.display === 'block') {
                        openDropdown.style.display = 'none';
                    }
                }
            }
        }

            function logout() {
                window.location.href = "/";

            }
    </script>

</head>

<body>
    <header class="homepage-header">
        <div class="logo">
            <div class="header-text">
                <img src="{{asset('images/brasao.png')}}" alt="Logo da Prefeitura">
                <div class="text">
                    <p class="small-text">Prefeitura Municipal de</p>
                    <p class="large-text">Cerro Grande do Sul</p>
                </div>
            </div>
        </div>
        <div class="dropdown" id="profileDropdown">
            <button class="dropbtn">Meu perfil</button>
            <div class="dropdown-content">
                <a href="/editarPerfil">Editar perfil</a>
                <a href="/meusProtocolos">Meus protocolos</a>
                <a href="/" onclick="logout()">Sair</a>
            </div>
        </div>
    </header>

    <nav class="navigation-bar">
        <ul>
            <li><a href="#">O que é</a></li>
            <li>|</li>
            <li><a href="#"> Benefícios</a></li>
            <li>|</li>
            <li><a href="#"> Como funciona</a></li>
            <li>|</li>
            <li><a href="#"> Como acessar</a></li>
            <li>|</li>
            <li><a href="#"> Perguntas frequentes</a></li>
        </ul>
    </nav>


    @yield('conteudo')

</body>

</html>