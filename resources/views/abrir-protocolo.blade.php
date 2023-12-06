@extends('template')

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link rel="stylesheet" href="css/abrir-protocolo.css">
@section('titulo')
Abrir Protocolo
@stop

@section('conteudo')
<i class="fas fa-arrow-left"
    style="vertical-align: middle; font-size: large; margin-left: 10px; margin-top: 10px; cursor: pointer;"
    onclick="history.back()"></i>
<div class="widget-container">
    <div class="widget">
        <h3>Dados do Protocolo</h3>
        <form action = "{{route ('formularioProtocolo')}}" method="post">
        @csrf
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder = "Nome do solicitante..." value="{{ $user['nome'] ?? '' }}" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder = "E-mail do solicitante..." value="{{ $user['email'] ?? '' }}"  required>

            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" placeholder = "Telefone do solicitante..." value="{{ $user['telefone'] ?? '' }}" required>

            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" placeholder = "Endereço do solicitante..." required>

            <label for="setor">Setor:</label>
            <input type="text" id="setor" name="setor" placeholder = "Setor de encaminhamento do protocolo..." required>

            <label for="assunto">Assunto:</label>
            <input type="text" id="assunto" name="assunto" placeholder = "Assunto do protocolo..." required>

            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" rows="4" required></textarea>

            <button type="submit">Abrir Protocolo</button>
        </form>
    </div>
</div>
<!-- Abrir Protocolo -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var setorSelecionado = sessionStorage.getItem('setorSelecionado');
        if (setorSelecionado) {
            document.getElementById("setor").value = setorSelecionado;
            document.getElementById("setor").readOnly = true; 
            sessionStorage.removeItem('setorSelecionado');
        }
    });
</script>



@stop
