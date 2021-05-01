<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\Dados;
use App\Funcoes\Simulador;

class SimuladorController extends Controller
{    
    public function listarConvenios()
    {
        return response()->json(app(Dados::class)->getDados('convenios'));
    }

    public function listarInstituicoes()
    {
        return response()->json(app(Dados::class)->getDados('instituicoes'));
    }

    public function simularEmprestimo(Request $request)
    {
        $request->validate([
            'valor_emprestimo' => 'numeric|required',
            'instituicoes' => 'array|nullable',
            'convenios' => 'array|nullable',
            'parcela' => 'numeric|nullable'
        ]);

        $taxas_instituicoes = app(Dados::class)->getDados('taxas_instituicoes');

        return response()->json(app(Simulador::class)->calcularDadosSimulacao($request, $taxas_instituicoes));
    }
}
