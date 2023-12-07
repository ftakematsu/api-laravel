<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // Campos da tabela que são modificáveis
    protected $fillable = [
        'user_id', 'name', 'phone'
    ];
}
