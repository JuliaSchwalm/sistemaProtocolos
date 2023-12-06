<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protocolo extends Model
{
    protected $table = 'protocolos'; 
    protected $fillable = ['endereco','assunto', 'setor', 'descricao', 'id_requerente', 'situacao'];
    public function cadastro()
    {
        return $this->belongsTo(Cadastro::class, 'id_requerente');
    }
}
