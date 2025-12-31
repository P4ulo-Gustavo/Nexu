<?php

declare(strict_types=1);

require_once 'func_validaaccount.php';

//Criando o objeto conta

class Account
{
    private string $nome;
    private string $email;
    private string $tel;
    private string $cpf;
    private string $sexo;
    private string $senha;
    private string $endereco;
    private bool $ativo;
    private int $nivelAcesso;
    public function __construct(string $nome, string $email, string $tel, string $cpf, string $sexo, string $senha, string $endereco, bool $ativo, int $nivelAcesso)
    {
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setTel($tel);
        $this->setCpf($cpf);
        $this->setSexo($sexo);
        $this->setSenha($senha);
        $this->setEndereco($endereco);
        $this->setAtivo($ativo);
        $this->setNivelAcesso($nivelAcesso);
    }

    // SETTERS 
    private function setNome(string $nome): void
    {
        if (!empty($nome)) {
            $this->nome = $nome;
        } else {
            throw new InvalidArgumentException("Nome não pode ser vazio.");
        }
    }
    //
    private function setEmail(string $email): void
    {
        if (validaEmail($email)) {
            $this->email = $email;
        } else {
            throw new InvalidArgumentException("Email inválido ou vazio!!");
        }
    }
    //
    private function setTel(string $tel): void
    {
        $novotel = validaTel($tel);
        if ($novotel !== false) {
            $this->tel = $novotel;
        } else {
            throw new InvalidArgumentException("Telefone inválido ou vazio!!");
        }
    }
    //
    private function setCpf(string $cpf): void
    {
        $novocpf = validaCPF($cpf);
        if ($novocpf !== false) {
            $this->cpf = $novocpf;
        } else {
            throw new InvalidArgumentException("CPF inválido ou vazio!!");
        }
    }
    //
    private function setEndereco(string $endereco): void
    {
        if (!empty($endereco)) {
            $this->endereco = $endereco;
        } else {
            throw new InvalidArgumentException("Endereço não pode ser vazio.");
        }
    }
    //
    private function setSexo(string $sexo): void
    {
        $sexo = strtolower($sexo);
        if (validaSexo($sexo)) {
            $this->sexo = $sexo;
        } else {
            throw new InvalidArgumentException("Sexo inválido ou vazio!!");
        }
    }
    //
    private function setSenha(string $senha): void
    {
        if (!empty($senha) && strlen($senha) >= 8) {
            $senha = password_hash($senha, PASSWORD_DEFAULT);
            $this->senha = $senha;
        } else {
            throw new InvalidArgumentException("Senha não pode ser vazia e menor que 8 caracteres.");
        }
    }
    //
    private function setAtivo(bool $ativo): void
    {
        $this->ativo = $ativo;
    }
    //
    private function setNivelAcesso(int $nivelAcesso): void
    {
        if ($nivelAcesso > 0) {
            $this->nivelAcesso = $nivelAcesso;
        } else {
            throw new InvalidArgumentException("Nível de Acesso não pode ser vazio.");
        }
    }

    // GETTERS
    public function getNome(): string
    {
        return $this->nome;
    }
    //
    public function getEmail(): string
    {
        return $this->email;
    }
    //
    public function getTelefone(): string
    {
        return $this->tel;
    }
    //
    public function getCpf(): string
    {
        return $this->cpf;
    }
    //
    public function getEndereco(): string
    {
        return $this->endereco;
    }
    //
    public function getAtivo(): bool
    {
        return $this->ativo;
    }
    //
    public function getSexo(): string
    {
        return $this->sexo;
    }
    public function getNivelAcesso(): int
    {
        return $this->nivelAcesso;
    }
}

class AccountRepository
{
    private $pdo;
}
