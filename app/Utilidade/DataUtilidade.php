<?php


namespace App\Utilidade;


abstract class DataUtilidade
{
    public static function retornaDataAtualFormatada(string $dataNaoFormatada): string
    {
        $arrayComDataNaoFormatada = explode('/', $dataNaoFormatada);
        $dataFormatada = join('-', array_reverse($arrayComDataNaoFormatada));

        return $dataFormatada;
    }
}
