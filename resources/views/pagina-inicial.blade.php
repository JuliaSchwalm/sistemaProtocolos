@extends('template')

<link rel="stylesheet" href="css/pagina-inicial.css">

@section('titulo')
Página Inicial
@stop
@section('conteudo')
<div class="widget-container">
    <div class="widget">
        <h3>Buscar Assunto</h3>
        <div class="search-container">
            <input type="text" placeholder="Digite o assunto...">
            <button class="search-button" type="button">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</div>

<script>
    function selecionaSetor(setor) {
        sessionStorage.setItem('setorSelecionado', setor);
    }
</script>


<div class="second-widget-container">
    <div class="second-widget">
        <h3>Para abrir seu protocolo, busque o assunto desejado ou escolha uma opção abaixo.</h3>
        <ul class="menu-options">
            <li class="selectall filter button btn btn-outline-secondary my-1 down setor-link"
                data-setor="Administração" data-filter=".Administracao" id="administracao">
                <i class="fas fa-briefcase" style="vertical-align: middle; font-size: large;"></i>&nbsp;
                <a href="\abrirProtocolo" onclick="selecionaSetor('Administração')"> Administração </a>
            </li>


            <li class="selectall filter button btn btn-outline-secondary my-1 down setor-link"
                data-setor="Fazenda" data-filter=".Fazenda" id="fazenda">
                <i class="fas fa-money-bill-alt" style="vertical-align: middle; font-size: large;"></i>&nbsp;
                <a href="/abrirProtocolo" onclick="selecionaSetor('Fazenda')">Fazenda </a>
            </li>

            <li class="selectall filter button btn btn-outline-secondary my-1 down setor-link"
                data-setor="Gabinete do Prefeito" data-filter=".Gabinete" id="gabinete">
                <i class="fas fa-user-tie" style="vertical-align: middle; font-size: large;"></i>&nbsp;
                <a href="/abrirProtocolo" onclick="selecionaSetor('Gabinete do Prefeito')"> Gabinete do Prefeito </a>
            </li>

            <li class="selectall filter button btn btn-outline-secondary my-1 down setor-link"
                data-setor=" Meio Ambiente" data-filter=".MeioAmbiente" id="meioAmbiente">
                <i class="fas fa-tree" style="vertical-align: middle; font-size: large;"></i>&nbsp;
                <a href="/meioAmbiente" onclick="selecionaSetor(' Meio Ambiente')"> Meio Ambiente </a>
            </li>


            <li class="selectall filter button btn btn-outline-secondary my-1 down setor-link"
                data-setor="Agricultura" data-filter=".Agricultura" id="agricultura">
                <i class="fas fa-tractor" style="vertical-align: middle; font-size: large;"></i>&nbsp;
                <a href="/abrirProtocolo" onclick="selecionaSetor('Agricultura')"> Agricultura </a>
            </li>


            <li class="selectall filter button btn btn-outline-secondary my-1 down setor-link"
                data-setor="Assistência Social" data-filter=".AssistenciaSocial" id="assistenciaSocial">
                <i class="fas fa-hands-helping" style="vertical-align: middle; font-size: large;"></i>&nbsp;
                <a href="/abrirProtocolo" onclick="selecionaSetor('Assistência Social')">Assistência Social </a>
            </li>


            <li class="selectall filter button btn btn-outline-secondary my-1 down setor-link"
                data-setor="Saúde" data-filter=".Saude" id="saude">
                <i class="fas fa-medkit" style="vertical-align: middle; font-size: large;"></i>&nbsp;
                <a href="/abrirProtocolo" onclick="selecionaSetor('Saúde')">Saúde </a>
            </li>

            <li class="selectall filter button btn btn-outline-secondary my-1 down setor-link"
                data-setor="Educação" data-filter=".Educacao" id="educacao">
                <i class="fas fa-graduation-cap" style="vertical-align: middle; font-size: large;"></i>&nbsp;
                <a href="/abrirProtocolo" onclick="selecionaSetor('Educação')">Educação </a>
            </li>


            <li class="selectall filter button btn btn-outline-secondary my-1 down setor-link"
                data-setor="Obras" data-filter=".Obras" id="obras">
                <i class="fas fa-wrench" style="vertical-align: middle; font-size: large;"></i>&nbsp;
                <a href="/abrirProtocolo" onclick="selecionaSetor('Obras')"> Obras </a>
            </li>

            <li class="selectall filter button btn btn-outline-secondary my-1 down setor-link"
                data-setor="Esporte e Cultura" data-filter=".EsporteCultura" id="esporteCultura">
                <i class="fas fa-futbol" style="vertical-align: middle; font-size: large;"></i>&nbsp;
                <a href="/abrirProtocolo" onclick="selecionaSetor('Esporte e Cultura')"> Esporte e Cultura </a>
            </li>


            <li class="selectall filter button btn btn-outline-secondary my-1 down setor-link"
                data-setor="Recursos Humanos (RH)" data-filter=".RH" id="rh">
                <i class="fas fa-users" style="vertical-align: middle; font-size: large;"></i>&nbsp;
                <a href="/abrirProtocolo" onclick="selecionaSetor('Recursos Humanos (RH)')"> Recursos Humanos (RH) </a>
            </li>

            <li class="selectall filter button btn btn-outline-secondary my-1 down setor-link"
                data-setor="Compras" data-filter=".Compras" id="compras">
                <i class="fas fa-shopping-cart" style="vertical-align: middle; font-size: large;"></i>&nbsp;
                <a href="/abrirProtocolo" onclick="selecionaSetor('Compras')"> Compras </a>
            </li>

            <li class="selectall filter button btn btn-outline-secondary my-1 down setor-link"
                data-setor="Engenharia Civil" data-filter=".EngenhariaCivil" id="engenhariaCivil">
                <i class="fas fa-hard-hat" style="vertical-align: middle; font-size: large;"></i>&nbsp;
                <a href="/abrirProtocolo" onclick="selecionaSetor('Engenharia Civil')"> Engenharia Civil </a>
            </li>


        </ul>

    </div>
</div>
@stop