@extends('template')
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/meus-protocolos.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@section('titulo')
Meus Protocolos
@stop

@section('conteudo')
<i class="fas fa-arrow-left"
    style="vertical-align: middle; font-size: large; margin-left: 10px; margin-top: 10px; cursor: pointer;"
    onclick="history.back()"></i>

<div class="protocol-list-container">
    <h2 class="page-title">Meus Protocolos</h2>

    <!-- Dropdown para selecionar a situação dos protocolos -->
    <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Selecione a Situação
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item em-analise" href="#" onclick="carregarProtocolos('analise')">Em Análise</a>
        <a class="dropdown-item em-atendimento" href="#" onclick="carregarProtocolos('atendimento')">Em Atendimento</a>
        <a class="dropdown-item concluido" href="#" onclick="carregarProtocolos('concluido')">Concluído</a>
    </div>
</div>


    <!-- Tabela para exibir os protocolos -->
    <div class="table-container">
        <table class="protocol-list" id="protocol-list">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Assunto</th>
                    <th>Setor</th>
                    <th>Requerente</th>
                    <th>Detalhes</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aqui será inserido dinamicamente o conteúdo da tabela com AJAX -->
            </tbody>
        </table>
    </div>
</div>

<script>
    // Verifica se o jQuery está definido antes de usar
    if (typeof jQuery != 'undefined') {
        // Função para carregar os protocolos com AJAX
        function carregarProtocolos(situacao) {
            $.ajax({
                url: '/get-protocolos',  // Atualizado para o caminho correto
                type: 'GET',
                data: { situacao: situacao },
                success: function (data) {
                    // Limpa o conteúdo atual da tabela
                    $('#protocol-list tbody').empty();
                    console.log('Dados recebidos: ', data);
                    console.log('Protocolos recebidos: ', data.protocolos);

                    // Preenche a tabela com os dados retornados
                    $.each(data.protocolos, function (index, protocolo) {
                        $('#protocol-list tbody').append(`
                            <tr class="protocol-item">
                                <td>${protocolo.id}</td>
                                <td>${protocolo.assunto}</td>
                                <td>${protocolo.setor}</td>
                                <td>${protocolo.cadastro.nome}</td>
                                <td><a href="{{ url('detalhesProtocolos') }}/${protocolo.id}" class="view-details"><i class="fas fa-eye"></i></a></td>
                            </tr>
                        `);
                    });
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        // Inicialmente, carrega os protocolos em análise
        carregarProtocolos('analise');
    } else {
        console.error('jQuery não está definido. Verifique seu link para o jQuery.');
    }
</script>



@stop
