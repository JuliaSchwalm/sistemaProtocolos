<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Protocolo; 

class Cadastro extends Model
{
    protected $table = 'cadastros'; 
    protected $fillable = ['nome','cpf-cnpj', 'senha', 'email', 'telefone'];

    public function protocolos()
    {
        return $this->hasMany(Protocolo::class, 'id_requerente');
    }
}
