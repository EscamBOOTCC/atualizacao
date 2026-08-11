<?php

namespace App\Models;

class FormacaoAcademica
{
    protected ?int $IdFormacaoAcademica;
    //um objeto da classe trabalhador aqui
    protected Trabalhador $Trabalhador;
    protected ?string $Instituicao;
    protected ?string $Curso;
    protected ?string $Descricao;

    public function __construct(Trabalhador $Trabalhador, ?string $Instituicao, ?string $Curso, ?string $Descricao)
    {
        $this->Trabalhador = $Trabalhador;
        $this->Instituicao = $Instituicao;
        $this->Curso = $Curso;
        $this->Descricao = $Descricao;
    }

    //Getters e Setters

    public function getIdFormacaoAcademica(): ?int
    {
        return $this->IdFormacaoAcademica;
    }

    public function setIdFormacaoAcademica(?int $IdFormacaoAcademica): self
    {
        $this->IdFormacaoAcademica = $IdFormacaoAcademica;

        return $this;
    }

    public function getInstituicao(): ?string
    {
        return $this->Instituicao;
    }

    public function setInstituicao(?string $Instituicao): self
    {
        $this->Instituicao = $Instituicao;

        return $this;
    }

    public function getCurso(): ?string
    {
        return $this->Curso;
    }

    public function setCurso(?string $Curso): self
    {
        $this->Curso = $Curso;

        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->Descricao;
    }

    public function setDescricao(?string $Descricao): self
    {
        $this->Descricao = $Descricao;

        return $this;
    }
}