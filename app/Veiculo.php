<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //Implementando o soft delet;

class Veiculo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'placa',
        'renavam',
        'modelo',
        'marca',
        'ano',
        'proprietario_id'
    ];

    public function proprietario()
    {
        return $this->belongsTo(User::class, 'proprietario_id');
    }
}
