@extends('template')
<link rel="stylesheet" href="css/editar-perfil.css">
@section('titulo')
Editar Perfil
@stop

@section('conteudo')
<i class="fas fa-arrow-left"
    style="vertical-align: middle; font-size: large; margin-left: 10px; margin-top: 10px; cursor: pointer;"
    onclick="history.back()"></i>

<div class="edit-profile-container">
    <h1>Editar Perfil</h1>
    <form action="{{ route('atualizaPerfil') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ session('user')['nome'] ?? '' }}" required>
        </div>
        <div class="form-group">
            <label for="cpf_cnpj">CPF-CNPJ:</label>
            <input type="text" id="cpf_cnpj" name="cpf_cnpj" value="{{ session('user')['cpf-cnpj'] ?? '' }}" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" value="{{ session('user')['senha'] ?? '' }}" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="{{ session('user')['email'] ?? '' }}" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" value="{{ session('user')['telefone'] ?? '' }}" required>
        </div>
        <button type="submit">Atualizar Perfil</button>
    </form>
</div>

@stop
