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
        $user = session('user');
        if ($user) {
            return view('abrir-protocolo', ['user' => $user]);
        } else {
            return redirect()->route('pagina_de_redirecionamento');
        }
    }


    public function meusProtocolos()
    {
        $user = session('user');
        $protocolos = Cadastro::find($user['id'])->protocolos;
        return view('meus-protocolos', ['protocolos' => $protocolos]);
    }


    public function filtrarProtocolos(Request $request)
    {
        $estado = $request->input('estado');
        $user = session('user');
        $protocolos = Cadastro::find($user['id'])->protocolos()->where('estado', $estado)->get();
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


    public function editarPerfil()
    {
        $user = session('user');
        return view('editar-perfil', ['perfil' => $user]);
    }

    public function atualizaPerfil(Request $request)
    {
        $user = session('user');
        $existingUser = Cadastro::where('cpf-cnpj', $request->input('cpf_cnpj'))->first();
        if ($existingUser) {
            $existingUser->update([
                'nome' => $request->input('nome'),
                'cpf-cnpj' => $request->input('cpf_cnpj'),
                'senha' => $request->input('senha'),
                'email' => $request->input('email'),
                'telefone' => $request->input('telefone'),
            ]);
            session(['user' => $existingUser]);
            echo "<script>alert('Perfil atualizado com sucesso!');</script>";
            return view('editar-perfil', ['perfil' => $existingUser]);
        }
        Cadastro::create([
            'cpf-cnpj' => $request->input('cpf_cnpj'),
            'senha' => $request->input('senha'),
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'telefone' => $request->input('telefone'),
        ]);
        return view('editar-perfil', ['perfil' => $user]);
    }


    public function formularioProtocolo(Request $request)
    {
        $user = session('user');
        if ($user) {
            $protocolo = new Protocolo([
                'endereco' => $request->input('endereco'),
                'assunto' => $request->input('assunto'),
                'setor' => $request->input('setor'),
                'descricao' => $request->input('descricao'),
                'id_requerente' => $user
            ]);
            $user->protocolos()->save($protocolo);
            echo "<script>alert('Protocolo cadastrado com sucesso!');</script>";
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


