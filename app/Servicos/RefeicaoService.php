<?php


namespace App\Servicos;

use App\Usuario;
use App\Utilidade\DataUtilidade;

class RefeicaoService
{
    public function buscaAlimentosDoDia(int $idDoUsuario): array
    {
        $refeicoesDoDia = Usuario::find($idDoUsuario)->refeicoes->where('data', DataUtilidade::retornaDataAtualFormatada());

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
}
