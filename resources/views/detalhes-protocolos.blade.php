@extends('template')

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('css/detalhes-protocolos.css') }}">

@section('titulo')
Detalhes do Protocolo
@stop

@section('conteudo')
<i class="fas fa-arrow-left" style="vertical-align: middle; font-size: large; margin-left: 10px; margin-top: 10px; cursor: pointer;" onclick="history.back()"></i>

<div class="detalhes-protocolo-container">

    <!-- Primeiro Container -->
    <div class="detalhes-header">
        <h2 style = "text-align: center;">Detalhes do Protocolo</h2><br>
        <div class="protocolo-info">
            <span><b>Número do protocolo:</b> {{ $protocolo->id }}</span><br><br>
            <span><b>Assunto: </b>{{ $protocolo->assunto }}</span><br><br>
            <span><b>Setor:</b> {{ $protocolo->setor }}</span><br><br>
            <div class="descricao-protocolo">
            <h3>Descrição do Protocolo</h3>
            <p>{{ $protocolo->descricao }}</p>
        </div>
        </div>
    </div>

    <!-- Segundo Container -->
    <div class="detalhes-protocolo-container-second">

        <div class="respostas-protocolo">
            <h3>Respostas do Protocolo</h3>
            <ul>
                <li>
                    <span>Data/Hora: </span>
                    <span>Setor: </span>
                    <span>Responsável: </span>
                    <p>Resposta</p>
                </li>
                <!-- Adicione mais respostas conforme necessário -->
            </ul>
        </div>
    </div>

</div>

@stop
