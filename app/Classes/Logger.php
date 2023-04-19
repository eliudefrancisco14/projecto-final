<?php

namespace App\Classes;

use Illuminate\Support\Facades\Log;


class Logger{

    public function log($level, $message){

        //Adicionar mensagem a identificação do User Ativo
        if (session()->has('user')) {
            $message = '[' . session('user') . '] - ' . $message;
        }else{
            $message = '[N/A] - ' . $message;
        }

        // registrar uma entrada nos logs
        Log::channel('main')->$level($message);

    }
}