<?php
require_once 'func_validações.php';

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

    public function __construct(string $nome, string $email, string $tel, $cpf, string $sexo, string $senha, string $endereco)
    {
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setTel($tel);
    }

    protected function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    protected function setEmail(string $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            throw new InvalidArgumentException('Email inválido');
        }
    }
    protected function setTel(string $tel)
    {
        $this->tel = sanitizateTelefoneBr($tel, 'validaTelefoneBR');
    }
    protected function setCpf($cpf) {}
}
