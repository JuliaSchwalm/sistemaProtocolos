<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cadastro;
use App\Models\Protocolo;

class Controlador extends Controller
{


    public function index()
    {
        return view('index');
    }

    public function formLogin()
    {
        return view('cadastro-login');
    }
    public function paginaInicial()
    {
        return view('pagina-inicial');
    }

    public function preencheLogin(Request $request)
    {
        $existeCPF = Cadastro::where('cpf-cnpj', $request->input('cpfCnpj'))->exists();

        if ($existeCPF) {
            echo "<script>alert('CPF ou CNPJ já cadastrado!');</script>";
        } else {
            $db = new Cadastro();
            Cadastro::create([
                'cpf-cnpj' => $request->input('cpfCnpj'),
                'senha' => $request->input('senha'),
            ]);
            echo "<script>alert('Cadastrado com sucesso!');</script>";
        }
        return view('index');
    }


    public function validaLogin(Request $request)
    {
        $existeCPF = Cadastro::where('cpf-cnpj', $request->input('cpfCnpj'))->exists();

        if ($existeCPF) {
            $usuario = Cadastro::where('cpf-cnpj', $request->input('cpfCnpj'))->first();
            if ($usuario && $request->input('senha') === $usuario->senha) {
                session(['user' => $usuario]);
                return view('pagina-inicial');
            } else {
                echo "<script>alert('Senha inválida!');</script>";
            }
        } else {
            echo "<script>alert('CPF ou CNPJ não cadastrado!');</script>";
        }

        return view('index');

    }
    public function meioAmbiente()
    {
        return view('meio-ambiente');
    }
    public function meuPerfil()
    {
        return view('index');
    }

    public function abrirProtocolo()
    {
        // Obtém os dados do usuário da sessão
        $user = session('user');

        // Verifica se os dados do usuário estão presentes na sessão
        if ($user) {
            // Passa os dados do usuário para a visualização
            return view('abrir-protocolo', ['user' => $user]);
        } else {
            // Caso não esteja na sessão, redireciona para a página desejada
            return redirect()->route('pagina_de_redirecionamento');
        }
    }



    public function meusProtocolos()
    {
        // Obtém os dados do usuário da sessão
        $user = session('user');

        // Obtém os protocolos associados ao usuário
        $protocolos = Cadastro::find($user['id'])->protocolos;

        // Passa os protocolos para a visão
        return view('meus-protocolos', ['protocolos' => $protocolos]);
    }

    public function filtrarProtocolos(Request $request)
    {
        // Obtém o estado selecionado do filtro
        $estado = $request->input('estado');

        // Obtém os dados do usuário da sessão
        $user = session('user');

        // Obtém os protocolos associados ao usuário, filtrando pelo estado
        $protocolos = Cadastro::find($user['id'])->protocolos()->where('estado', $estado)->get();

        // Retorna os protocolos filtrados em formato JSON
        return response()->json(['protocolos' => $protocolos]);
    }
    public function getProtocolos(Request $request)
    {
        
        $situacao = $request->get('situacao');
        $user = session('user');
    
       
    
        $protocolos = Cadastro::find($user['id'])
            ->protocolos()
            ->with('cadastro')
            ->where('situacao', $situacao)
            ->get();
    
        
    
        return response()->json(['protocolos' => $protocolos->toArray()]);
    }
    






    // ...

    public function editarPerfil()
    {

        // Obtém os dados do usuário da sessão
        $user = session('user');

        // Passa os dados do usuário para a visão
        return view('editar-perfil', ['perfil' => $user]);
    }

    public function atualizaPerfil(Request $request)
    {
        // Obtém os dados do usuário da sessão
        $user = session('user');

        // Verifica se já existe um registro com o mesmo CPF-CNPJ no banco de dados
        $existingUser = Cadastro::where('cpf-cnpj', $request->input('cpf_cnpj'))->first();

        // Se já existir um registro, atualiza esse registro
        if ($existingUser) {
            $existingUser->update([
                'nome' => $request->input('nome'),
                'cpf-cnpj' => $request->input('cpf_cnpj'),
                'senha' => $request->input('senha'),
                'email' => $request->input('email'),
                'telefone' => $request->input('telefone'),
                // Adicione outras atualizações conforme necessário
            ]);

            // Atualiza os dados do usuário na sessão
            session(['user' => $existingUser]);
            echo "<script>alert('Perfil atualizado com sucesso!');</script>";
            // Redireciona de volta para a página de edição de perfil com uma mensagem de sucesso
            return view('editar-perfil', ['perfil' => $existingUser]);
        }

        // Se não existir um registro, cria um novo registro no banco de dados
        Cadastro::create([
            'cpf-cnpj' => $request->input('cpf_cnpj'),
            'senha' => $request->input('senha'),
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'telefone' => $request->input('telefone'),
            // Adicione outros campos conforme necessário
        ]);

        // Redireciona de volta para a página de edição de perfil com uma mensagem de sucesso
        return view('editar-perfil', ['perfil' => $user]);
    }


    public function formularioProtocolo(Request $request)
    {
        // Obtém os dados do usuário da sessão
        $user = session('user');

        if ($user) {
            // Cria um novo protocolo associado ao usuário
            $protocolo = new Protocolo([
                'endereco' => $request->input('endereco'),
                'assunto' => $request->input('assunto'),
                'setor' => $request->input('setor'),
                'descricao' => $request->input('descricao'),
                'id_requerente' => $user
            ]);


            // Associa o protocolo ao usuário
            $user->protocolos()->save($protocolo);
            echo "<script>alert('Protocolo cadastrado com sucesso!');</script>";
            // Redireciona de volta para a página inicial com uma mensagem de sucesso
            return view('pagina-inicial');

        } else {
            echo "<script>alert('Falha ao cadastradar protocolo!');</script>";

        }

    }

    public function detalhesProtocolos($id)
    {
        $protocolo = Protocolo::find($id);
        return view('detalhes-protocolos', compact('protocolo'));
    }

}


