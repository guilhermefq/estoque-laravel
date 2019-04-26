<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    // Definindo explicitamente o nome da tabela relacionado ao Model
    protected $table = 'produtos';
}
