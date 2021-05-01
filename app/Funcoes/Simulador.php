<?php

namespace App\Funcoes;

class Simulador 
{    
    public function calcularDadosSimulacao($request, $dados)
    {
        $data = [];

        foreach($dados as $taxa)
        {
            if ($request->has('instituicoes') && !in_array($taxa['instituicao'], $request->instituicoes)) continue;

            if ($request->has('convenios') && !in_array($taxa['convenio'], $request->convenios)) continue;

            if ($request->has('parcela') && $taxa['parcelas'] != $request->parcela) continue;

            if (!array_key_exists($taxa['instituicao'], $data)) {
                $data[$taxa['instituicao']] = [];
            }

            $calculador_parcelas = $request->valor_emprestimo * $taxa['coeficiente'];
            $array_gerado = ['taxa' => $taxa['taxaJuros'], 'parcela' => $taxa['parcelas'], 'valor_parcela' => $calculador_parcelas, 'convenio' => $taxa['convenio']];

            array_push($data[$taxa['instituicao']], $array_gerado);
        }

        return $data;
    }
}
