<?php


namespace App\Servicos;

use App\Usuario;
use Carbon\Carbon;

class RefeicaoService
{
    public function buscaAlimentosDoDia(int $idDoUsuario): array
    {
        $refeicoesDoDia = Usuario::find($idDoUsuario)->refeicoes->where('data', Carbon::now('America/Sao_Paulo')
            ->format("d/m/y"));

        $cafeDaManha = [];
        $almoco = [];
        $cafeDaTarde = [];
        $jantar = [];

        foreach ($refeicoesDoDia as $refeicaoDoDia) {
            switch ($refeicaoDoDia->periodo) {
                case "CAFÉ DA MANHÃ":
                    $alimentosRefeicao = $refeicaoDoDia->alimentosRefeicao;
                    foreach ($alimentosRefeicao as $alimentoRefeicao) {
                        $cafeDaManha[] = $alimentoRefeicao->alimento;
                    }
                    break;
                case "ALMOÇO":
                    $alimentosRefeicao = $refeicaoDoDia->alimentosRefeicao;
                    foreach ($alimentosRefeicao as $alimentoRefeicao) {
                        $almoco[] = $alimentoRefeicao->alimento;
                    }
                    break;
                case "CAFÉ DA TARDE":
                    $alimentosRefeicao = $refeicaoDoDia->alimentosRefeicao;
                    foreach ($alimentosRefeicao as $alimentoRefeicao) {
                        $cafeDaTarde[] = $alimentoRefeicao->alimento;
                    }
                    break;
                case "JANTAR":
                    $alimentosRefeicao = $refeicaoDoDia->alimentosRefeicao;
                    foreach ($alimentosRefeicao as $alimentoRefeicao) {
                        $jantar[] = $alimentoRefeicao->alimento;
                    }
                    break;
            }
        }
        return [$cafeDaManha, $almoco, $cafeDaTarde, $jantar];
    }

    public function calculaNumeroDeLinhasMaximoDoCardapio(array $cardapio): int
    {
        $tamanhoMaximo = 0;
        foreach ($cardapio as $refeicao) {
            $tamanhoMaximo = (count($refeicao) > $tamanhoMaximo) ? count($refeicao) : $tamanhoMaximo;
        }
        return $tamanhoMaximo;
    }
}
