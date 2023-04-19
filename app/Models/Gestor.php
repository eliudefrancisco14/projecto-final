<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gestor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function empresa() {
        return $this->belongsTo('App\Models\Empresas');
    }

    public function acesso() {
        return $this->belongsTo('App\Models\Acesso');
    }
}
