<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acesso extends Model
{
    use HasFactory;

    public function user() {
        return $this->hasMany('App\Models\User');
    }

    public function gestor() {
        return $this->hasMany('App\Models\Gestor');
    }
}
