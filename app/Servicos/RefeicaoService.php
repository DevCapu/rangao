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
        $tamanhoMaximo = -;
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
                $ingeridos = $refeicaoDoDia->ingeridos;
                foreach ($ingeridos as $ingerido) {
                    $this->cafeDaManha[] = $ingerido->alimento;
                }
                break;
            case "ALMOÇO":
                $ingeridos = $refeicaoDoDia->ingeridos;
                foreach ($ingeridos as $ingerido) {
                    $this->almoco[] = $ingerido->alimento;
                }
                break;
            case "CAFÉ DA TARDE":
                $ingeridos = $refeicaoDoDia->ingeridos;
                foreach ($ingeridos as $ingerido) {
                    $this->cafeDaTarde[] = $ingerido->alimento;
                }
                break;
            case "JANTAR":
                $ingeridos = $refeicaoDoDia->ingeridos;
                foreach ($ingeridos as $ingerido) {
                    $this->jantar[] = $ingerido->alimento;
                }
                break;
        }
    }
}
