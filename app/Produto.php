<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    // Definindo explicitamente o nome da tabela relacionado ao Model
    protected $table = 'produtos';
    public $timestamps = false;

    // Especificação de quais atributos pode ser populados.
    protected $fillable = array('nome', 'descricao', 'valor', 'quantidade');

    // Black-list de quais atributos não podem ser alterados
    protected $guarded = ['id'];
}
