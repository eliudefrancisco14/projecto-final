<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresas extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function gestor() {
        return $this->hasMany('App\Models\Gestor');
    }

    public function User() {
        return $this->hasMany('App\Models\User');
    }

}
