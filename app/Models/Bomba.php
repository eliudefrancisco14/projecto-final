<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bomba extends Model
{
    use HasFactory;
    use softDeletes;

    protected $guarded = [];
    

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function gestor() {
        return $this->belongsTo('App\Models\Gestor');
    }

    public function empresa() {
        return $this->belongsTo('App\Models\Empresas');
    }
}
