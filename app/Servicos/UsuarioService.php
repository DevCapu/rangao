<?php


namespace App\Servicos;


use Carbon\Carbon;
use DevCapu\NutriLive\App\PatientCalculator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioService
{
    private PatientCalculator $calculadoraDoPaciente;

    /**
     * UsuarioService constructor.
     * @param PatientCalculator $calculadoraDoPaciente
     */
    public function __construct(PatientCalculator $calculadoraDoPaciente)
    {
        $this->calculadoraDoPaciente = $calculadoraDoPaciente;
    }

    public function calculaIdade(string $dataDeNascimento): int
    {
        return $this->calculadoraDoPaciente->calculateAge($dataDeNascimento);
    }

    public function preencheUsuario(Request $request, float $gastoEnergeticoBasal, float $gastoEnergeticoTotal, float $caloriasParaConseguirObjetivo): array
    {
        return [
            "nome" => $request->nome,
            "nascimento" => $request->nascimento,
            "sexo" => $request->sexo,
            "objetivo" => $request->objetivo,
            "email" => $request->email,
            "senha" => Hash::make($request->senha),
            "altura" => $request->altura,
            "peso" => $request->peso,
            "atividade" => $request->atividade,
            "gastoEnergeticoBasal" => $gastoEnergeticoBasal,
            "gastoEnergeticoTotal" => $gastoEnergeticoTotal,
            "caloriasParaConseguirObjetivo" => $caloriasParaConseguirObjetivo,
            "foto" => ""
        ];
    }

    public function buscaRefeicoesDoDiaAtual()
    {
        $refeicoesDoDia = DB::table('refeicoes')
            ->join('refeicao_alimentos', 'refeicao_alimentos.id_refeicao', '=', 'refeicoes.id')
            ->join('alimentos', 'alimentos.id', '=', 'refeicao_alimentos.id_alimento')
            ->select(
                'refeicao_alimentos.id',
                'refeicoes.periodo',
                'alimentos.nome',
                'alimentos.calorias',
                'refeicao_alimentos.quantidade',
                )
            ->where(['data' => $this->retornaDataAtualFormatada(), 'id_usuario' => Auth::id()])
            ->get();

        return $refeicoesDoDia;
    }

    private function retornaDataAtualFormatada()
    {
        $dataDeHoje = explode(' ', Carbon::now('America/Sao_Paulo')->subDay());
        $dataDeHoje = join('/', array_reverse(explode('-', $dataDeHoje[0])));

        return $dataDeHoje;
    }
}
