<?php

namespace App\Classes\Perguntas;

class Quantidade 
{

    
    public function LocalizarQuantidade($pergunt) {

        //INICIO LOCALIZAR QUANTIDADE NA PERGUNTA
        $frase = $pergunt;
        //INICIO LOCALIZAR QUANTIDADE NA PERGUNTA
        $palavras = array(" um ", " dois ", " uma ", " duas ", " treis ", " tres ", " três ", " quatro ", " cinco ", " seis ", " sete ", " oito ", " nove ", " dez ", " deis ",
            " Um ", " Dois ", " Tma ", " Duas ", " Treis ", " Tres ", " Três ", " Quatro ", " Cinco ", " Seis ", " Sete ", " Oito ", " Nove ", " Dez ", " Deis ",
            " 1 ", " 2 ", " 3 ", " 4 ", " 5 ", " 6 ", " 7 ", " 8 ", " 9 ", " 10 ", " 12 ",
            " 01 ", " 02 ", " 03 ", " 04 ", " 05 ", " 06 ", " 07 ", " 08 ", " 09 ",
            " 1p", " 2p", " 3p", " 4p", " 5p", " 6p", " 7p", " 8p", " 9p", " 10p", " 12p",
            " 01p", " 02p", " 03p", " 04p", " 05p", " 06p", " 07p", " 08p", " 09p",
            " 20 ", " 20p", " trinta ", " 40 ", " 40p", " quarenta ", " 50 ", " 50p", " cinquenta ", " 100 ", " 100p", " cem ");
        //percorrer a string em busca de varias palavras
        $quantAchada = 1;
        foreach ($palavras as $key => $value) {
            $pos = strpos($frase, $value);
            if ($pos == true) {
                //echo "key ".$value;
                //echo "<br/>";
                switch ($value) {
                    case " um ": $quantAchada = 1;
                        break;
                    case " dois ": $quantAchada = 2;
                        break;
                    case " uma ": $quantAchada = 1;
                        break;
                    case " duas ": $quantAchada = 2;
                        break;
                    case " treis ": $quantAchada = 3;
                        break;
                    case " tres ": $quantAchada = 3;
                        break;
                    case " três ": $quantAchada = 3;
                        break;
                    case " quatro ": $quantAchada = 4;
                        break;
                    case " cinco ": $quantAchada = 5;
                        break;
                    case " seis ": $quantAchada = 6;
                        break;
                    case " sete ": $quantAchada = 7;
                        break;
                    case " oito ": $quantAchada = 8;
                        break;
                    case " nove ": $quantAchada = 9;
                        break;
                    case " dez ": $quantAchada = 10;
                        break;
                    case " deis ": $quantAchada = 10;
                        break;
                    case " Um ": $quantAchada = 1;
                        break;
                    case " Dois ": $quantAchada = 2;
                        break;
                    case " Uma ": $quantAchada = 1;
                        break;
                    case " Duas ": $quantAchada = 2;
                        break;
                    case " Treis ": $quantAchada = 3;
                        break;
                    case " Tres ": $quantAchada = 3;
                        break;
                    case " Três ": $quantAchada = 3;
                        break;
                    case " Quatro ": $quantAchada = 4;
                        break;
                    case " Cinco ": $quantAchada = 5;
                        break;
                    case " Seis ": $quantAchada = 6;
                        break;
                    case " Sete ": $quantAchada = 7;
                        break;
                    case " Oito ": $quantAchada = 8;
                        break;
                    case " Nove ": $quantAchada = 9;
                        break;
                    case " Dez ": $quantAchada = 10;
                        break;
                    case " Deis ": $quantAchada = 10;
                        break;
                    case " 1 ": $quantAchada = 1;
                        break;
                    case " 2 ": $quantAchada = 2;
                        break;
                    case " 3 ": $quantAchada = 3;
                        break;
                    case " 4 ": $quantAchada = 4;
                        break;
                    case " 5 ": $quantAchada = 5;
                        break;
                    case " 6 ": $quantAchada = 6;
                        break;
                    case " 7 ": $quantAchada = 7;
                        break;
                    case " 8 ": $quantAchada = 8;
                        break;
                    case " 9 ": $quantAchada = 9;
                        break;
                    case " 10 ": $quantAchada = 10;
                        break;
                    case " 12 ": $quantAchada = 12;
                        break;
                    case " 01 ": $quantAchada = 1;
                        break;
                    case " 02 ": $quantAchada = 2;
                        break;
                    case " 03 ": $quantAchada = 3;
                        break;
                    case " 04 ": $quantAchada = 4;
                        break;
                    case " 05 ": $quantAchada = 5;
                        break;
                    case " 06 ": $quantAchada = 6;
                        break;
                    case " 07 ": $quantAchada = 7;
                        break;
                    case " 08 ": $quantAchada = 8;
                        break;
                    case " 09 ": $quantAchada = 9;
                        break;
                    case " 10 ": $quantAchada = 10;
                        break;
                    case " 1p": $quantAchada = 1;
                        break;
                    case " 2p": $quantAchada = 2;
                        break;
                    case " 3p": $quantAchada = 3;
                        break;
                    case " 4p": $quantAchada = 4;
                        break;
                    case " 5p": $quantAchada = 5;
                        break;
                    case " 6p": $quantAchada = 6;
                        break;
                    case " 7p": $quantAchada = 7;
                        break;
                    case " 8p": $quantAchada = 8;
                        break;
                    case " 9p": $quantAchada = 9;
                        break;
                    case " 10p": $quantAchada = 10;
                        break;
                    case " 12p": $quantAchada = 12;
                        break;
                    case " 01p": $quantAchada = 1;
                        break;
                    case " 02p": $quantAchada = 2;
                        break;
                    case " 03p": $quantAchada = 3;
                        break;
                    case " 04p": $quantAchada = 4;
                        break;
                    case " 05p": $quantAchada = 5;
                        break;
                    case " 06p": $quantAchada = 6;
                        break;
                    case " 07p": $quantAchada = 7;
                        break;
                    case " 08p": $quantAchada = 8;
                        break;
                    case " 09p": $quantAchada = 9;
                        break;
                    case " 20 ": $quantAchada = 20;
                        break;
                    case " 20p": $quantAchada = 20;
                        break;
                    case " vinte ": $quantAchada = 20;
                        break;
                    case " 30 ": $quantAchada = 30;
                        break;
                    case " 30p": $quantAchada = 30;
                        break;
                    case " trinta ": $quantAchada = 30;
                        break;
                    case " 40 ": $quantAchada = 40;
                        break;
                    case " 40p": $quantAchada = 40;
                        break;
                    case " quarenta ": $quantAchada = 40;
                        break;
                    case " 50 ": $quantAchada = 50;
                        break;
                    case " 50p": $quantAchada = 50;
                        break;
                    case " cinquenta ": $quantAchada = 50;
                        break;
                    case " 100 ": $quantAchada = 100;
                        break;
                    case " 100p": $quantAchada = 100;
                        break;
                    case " cem ": $quantAchada = 100;
                        break;
                }
            }
        }
        return $quantAchada;
    }


}