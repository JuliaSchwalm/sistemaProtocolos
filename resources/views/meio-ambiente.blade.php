@extends('template')
<link rel="stylesheet" href="css/meio-ambiente.css">
@section('titulo')
Meio ambiente
@stop
@section('conteudo')
<i class="fas fa-arrow-left"
    style="vertical-align: middle; font-size: large; margin-left: 10px; margin-top: 10px; cursor: pointer;"
    onclick="history.back()"></i>

<div class="widget-container-meio-ambiente">
    <div class="widget-meio-ambiente">
        <div class="protocolo">
            <div class="linha-contorno"></div>
            <h2>Fiscalização ambiental</h2>
            <p class="descricao">Meio Ambiente</p>
            <i class="fas fa-plus-circle"></i>
            <a href="/abrirProtocolo">Abrir Protocolo</a>
        </div>

        <div class="protocolo">
            <div class="linha-contorno"></div>
            <h2>Licenciamento ambiental</h2>
            <p class="descricao">Meio Ambiente</p>
            <i class="fas fa-plus-circle"></i>
            <a href="/abrirProtocolo">Abrir Protocolo</a>
        </div>

        <div class="protocolo">
            <div class="linha-contorno"></div>
            <h2>Limpeza pública</h2>
            <p class="descricao">Meio Ambiente</p>
            <i class="fas fa-plus-circle"></i>
            <a href="/abrirProtocolo">Abrir Protocolo</a>
        </div>

        <div class="protocolo">
            <div class="linha-contorno"></div>
            <h2>Recursos hídricos</h2>
            <p class="descricao">Meio Ambiente</p>
            <i class="fas fa-plus-circle"></i>
            <a href="/abrirProtocolo">Abrir Protocolo</a>
        </div>

        <div class="protocolo">
            <div class="linha-contorno"></div>
            <h2>Saneamento</h2>
            <p class="descricao">Meio Ambiente</p>
            <i class="fas fa-plus-circle"></i>
            <a href="/abrirProtocolo">Abrir Protocolo</a>
        </div>

        <div class="protocolo">
            <div class="linha-contorno"></div>
            <h2>Outros...</h2>
            <p class="descricao">Meio Ambiente</p>
            <i class="fas fa-plus-circle"></i>
            <a href="/abrirProtocolo">Abrir Protocolo</a>
        </div>
   
    </div>
</div>
@stop