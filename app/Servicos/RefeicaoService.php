<?php


namespace App\Servicos;

use App\Usuario;
use Carbon\Carbon;

class RefeicaoService
{

    private array $cafeDaManha;
    private array $almoco;
    private array $cafeDaTarde;
    private array $jantar;

    public function __construct()
    {
        $this->cafeDaManha = [];
        $this->almoco = [];
        $this->cafeDaTarde = [];
        $this->jantar = [];
    }

    public function buscaAlimentosDoDia(int $idDoUsuario): array
    {
        $refeicoesDoDia = $this->buscaAlimentosIngeridosNoDia($idDoUsuario);
        $this->ordenaAlimentosPorPeriodo($refeicoesDoDia);

        return [$this->cafeDaManha, $this->almoco, $this->cafeDaTarde, $this->jantar];
    }

    public function calculaNumeroDeLinhasMaximoDoCardapio(array $cardapio): int
    {
        $tamanhoMaximo = 0;
        foreach ($cardapio as $refeicao) {
            $tamanhoMaximo = (count($refeicao) > $tamanhoMaximo) ? count($refeicao) : $tamanhoMaximo;
        }
        return $tamanhoMaximo;
    }

    private function buscaAlimentosIngeridosNoDia(int $idDoUsuario)
    {
        return Usuario::find($idDoUsuario)->refeicoes->where('data', Carbon::now('America/Sao_Paulo')
            ->format("d/m/y"));
    }

    private function ordenaAlimentosPorPeriodo($refeicoesDoDia): void
    {
        foreach ($refeicoesDoDia as $refeicaoDoDia) {
            $this->insereNaListaDoPeriodo($refeicaoDoDia);
        }
    }

    private function insereNaListaDoPeriodo($refeicaoDoDia): void
    {
        switch ($refeicaoDoDia->periodo) {
            case "CAFÉ DA MANHÃ":
                $alimentosRefeicao = $refeicaoDoDia->alimentosRefeicao;
                foreach ($alimentosRefeicao as $alimentoRefeicao) {
                    $this->cafeDaManha[] = $alimentoRefeicao->alimento;
                }
                break;
            case "ALMOÇO":
                $alimentosRefeicao = $refeicaoDoDia->alimentosRefeicao;
                foreach ($alimentosRefeicao as $alimentoRefeicao) {
                    $this->almoco[] = $alimentoRefeicao->alimento;
                }
                break;
            case "CAFÉ DA TARDE":
                $alimentosRefeicao = $refeicaoDoDia->alimentosRefeicao;
                foreach ($alimentosRefeicao as $alimentoRefeicao) {
                    $this->cafeDaTarde[] = $alimentoRefeicao->alimento;
                }
                break;
            case "JANTAR":
                $alimentosRefeicao = $refeicaoDoDia->alimentosRefeicao;
                foreach ($alimentosRefeicao as $alimentoRefeicao) {
                    $this->jantar[] = $alimentoRefeicao->alimento;
                }
                break;
        }
    }
}
