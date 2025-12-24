<?php

declare(strict_types=1);

require_once 'func_validaaccount.php';

//Criando o objeto conta

class Account
{
    protected string $nome;
    protected string $email;
    protected string $tel;
    protected string $cpf;
    protected string $sexo;
    protected string $senha;
    protected string $endereco;

    public function __construct(string $nome, string $email, string $tel, string $cpf, string $sexo, string $senha, string $endereco)
    {
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setTel($tel);
        $this->setCpf($cpf);
        $this->setSexo($sexo);
        $this->setSenha($senha);
        $this->setEndereco($endereco);
    }

    // SETTERS 
    protected function setNome(string $nome)
    {
        if (!empty($nome)) {
            $this->nome = $nome;
        } else {
            throw new InvalidArgumentException('Nome Vazio');
        }
    }
    //
    protected function setEmail(string $email)
    {
        if (!empty($email)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->email = $email;
            } else {
                throw new InvalidArgumentException('Email inválido');
            }
        } else {
            throw new InvalidArgumentException('Email Vazio');
        }
    }
    //
    protected function setTel(string $tel)
    {
        if (!empty($tel)) {
            $this->tel = sanitizateTelefoneBr($tel, 'validaTelefoneBR');
        } else {
            throw new InvalidArgumentException('tel Vazio');
        }
    }
    //
    protected function setCpf(string $cpf)
    {
        if (!empty($cpf)) {
            if (validaCPF($cpf)) {
                $this->cpf = preg_replace('/\D/', '', $cpf);
            } else {
                throw new InvalidArgumentException('Cpf Inválido');
            }
        } else {
            throw new InvalidArgumentException('Cpf vazio');
        }
    }
    //
    protected function setSexo(string $sexo)
    {
        if (!empty($sexo)) {
            $sexo = strtolower($sexo);
            if (validaSexo($sexo)) {
                $this->sexo = $sexo;
            } else {
                throw new InvalidArgumentException('Sexo inválido');
            }
        } else {
            throw new InvalidArgumentException('Sexo Vazio');
        }
    }
    //
    protected function setSenha(string $senha)
    {
        if (!empty($senha)) {
            $this->senha = password_hash($senha, PASSWORD_DEFAULT);
        } else {
            throw new InvalidArgumentException('Senha Vazia');
        }
    }
    //
    protected function setEndereco(string $endereco)
    {
        if (!empty($endereco)) {
            $this->endereco = $endereco;
        } else {
            throw new InvalidArgumentException('Endereço Vazio');
        }
    }
}
