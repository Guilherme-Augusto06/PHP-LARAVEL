<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fornecedor extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'nome',
        'site',
        'uf',
        'email',
        'regiao'
    ];
}
