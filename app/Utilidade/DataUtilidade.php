<?php


namespace App\Utilidade;


use Carbon\Carbon;

abstract class DataUtilidade
{
    public static function retornaDataAtualFormatada(): string
    {
        $dataDeHoje = explode(' ', Carbon::now('America/Sao_Paulo'));
        $dataDeHoje = join('/', array_reverse(explode('-', $dataDeHoje[0])));

        return $dataDeHoje;
    }
}
