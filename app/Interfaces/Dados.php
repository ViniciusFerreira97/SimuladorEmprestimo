<?php

namespace App\Interfaces;

class Dados
{
    public function getDados($arquivo)
    {
        $urlArquivo = storage_path("app/Dados/$arquivo.json");
        $json = json_decode(file_get_contents($urlArquivo), true);
        return $json;
    }
}
