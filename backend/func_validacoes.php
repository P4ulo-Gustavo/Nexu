<?php

/* ELE VALIDA O TEL ATRAVÈS DO REGEX PARA CONFIRMAR SE O NUMERO CABE NO PADRÃO DE TELEFONE BRASILEIRO
(11)91234-5678 - movel
(11) 91234-5678
(11)912345678
(11) 912345678
(11)3456-7890
(11) 34567890

11912345678 - fixo
11 91234-5678
1191234-5678
1134567890
11 3456-7890

ESTE PADRÃO REGEX FOI GERADO PELO GPT, QUALQUER ERRO, RECLAMA COM ELE KRAY (VÁLIDO PARA VOCÊ TAMBÉM GUSTAVO!!SSS)
 */
function validaTelefoneBR($telefone)
{
    return preg_match('/^\(?\d{2}\)?\s?9?\d{4}-?\d{4}$/', $telefone);
}

/* 
Esta função utiliza a validadora para se o numero estiver certo, retirar os caracteres especiais, se eles existirem no texto
*/

function sanitizateTelefoneBr(string $telefone, callable $validaTelefoneBR): string
{ //validaTelefoneBR é uma função (callback)
    $char_ex = ['(', ')', '-', ' '];
    $caracteres = strlen($telefone);
    $novotel = '';

    if ($validaTelefoneBR($telefone)) {
        for ($i = 0; $i < $caracteres; $i++) {
            if (!in_array($telefone[$i], $char_ex)) {
                $novotel .=  $telefone[$i];
            }
        }
        return $novotel;
    } else {
        throw new InvalidArgumentException("Numero inválido");
    }
}
