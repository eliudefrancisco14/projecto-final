<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bomba;
use App\Models\User;
use App\Models\Empresas;
use App\Models\Gestor;
use Illuminate\Support\Facades\DB;

class MapaController extends Controller
{
    
    public function mapavisita(){
        $bomba = Bomba::all();
        return view('mapavisita', ['bomba' => $bomba]);
    }
    
    public function mapa() {
        $bomba = Bomba::all();
        return response()->view('map.resultado', [
            'bomba' => $bomba
        ])->header('Content-Type', 'text/xml');
      }

}
