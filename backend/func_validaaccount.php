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
Esta função utiliza a validadora para se o numero estiver certo, retirar os caracteres especiais, se eles existirem no texto
*/

function validaTel(string $telefone): string | false
{

    $char_ex = ['(', ')', '-', ' '];
    $caracteres = strlen($telefone);
    $novotel = '';

    if (preg_match('/^\(?\d{2}\)?\s?(?:9\d{4}|\d{4})-?\d{4}$/', $telefone)) {
        for ($i = 0; $i < $caracteres; $i++) {
            if (!in_array($telefone[$i], $char_ex)) {
                $novotel .=  $telefone[$i];
            }
        }
        return $novotel;
    } else {
        return false;
    }
}


function validaCPF(string $cpf): string | false
{
    // Remove tudo que não for número
    $cpf = preg_replace('/\D/', '', $cpf);

    // Verifica se tem 11 dígitos
    if (strlen($cpf) !== 11) {
        return false;
    }

    // Bloqueia CPFs com todos os dígitos iguais
    if (preg_match('/^(\d)\1{10}$/', $cpf)) {
        return false;
    }

    // Validação do primeiro dígito verificador
    for ($t = 9; $t < 11; $t++) {
        $soma = 0;
        for ($i = 0; $i < $t; $i++) {
            $soma += $cpf[$i] * (($t + 1) - $i);
        }

        $digito = (10 * $soma) % 11;
        $digito = ($digito == 10) ? 0 : $digito;

        if ($cpf[$t] != $digito) {
            return false;
        }
    }

    return $cpf;
}

function validaSexo($sexo): bool
{
    if (!empty($sexo)) {
        if ($sexo != "masculino" && $sexo != "feminino") {
            return false;
        }
    }
    if (empty($sexo)) {
        return false;
    }

    return true;
}

function validaEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}
