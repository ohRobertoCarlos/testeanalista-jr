<?php

namespace App;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{



    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id','id');
    }
}
