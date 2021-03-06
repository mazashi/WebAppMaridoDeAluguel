<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Profissionais;
use App\Entity\Usuarios;
use App\Entity\Servicos;

/**
 * Solicitacoes
 *
 * @ORM\Table(name="solicitacoes", indexes={@ORM\Index(name="fk_Solicitacoes_Usuarios1_idx", columns={"Usuarios_idUsuarios"}), @ORM\Index(name="fk_Solicitacoes_Profissionais1_idx", columns={"Profissionais_idProfissionais"}), @ORM\Index(name="fk_solicitacoes_servicos1_idx", columns={"servicos_idServico"})})
 * @ORM\Entity
 */
class Solicitacoes {

    /**
     * @var int
     *
     * @ORM\Column(name="idSolicitacoes", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsolicitacoes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="statusSolicitacao", type="integer", nullable=true)
     */
    private $statussolicitacao;
    
      /**
     * @var int|null
     *
     * @ORM\Column(name="avaliacao", type="integer", nullable=true)
     */
    private $avaliacao;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descricaoSolicitacao", type="string", length=45, nullable=true)
     */
    private $descricaosolicitacao;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dtSolicitacao", type="datetime", nullable=true)
     */
    private $dtsolicitacao;

    /**
     * @var string
     *
     * @ORM\Column(name="precoFinal", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $precofinal;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tempoChegada", type="integer", nullable=true)
     */
    private $tempochegada;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="trocaPreco", type="boolean", nullable=true)
     */
    private $trocapreco;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="trocaPrecoAutorizada", type="boolean", nullable=true)
     */
    private $trocaprecoautorizada;

    /**
     * @var string|null
     *
     * @ORM\Column(name="motivoTrocaPreco", type="string", length=200, nullable=true)
     */
    private $motivotrocapreco;

    /**
     * @var string|null
     *
     * @ORM\Column(name="novoValor", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $novovalor;

    /**
     * @var \Profissionais
     *
     * @ORM\ManyToOne(targetEntity="Profissionais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Profissionais_idProfissionais", referencedColumnName="idProfissionais")
     * })
     */
    private $profissionaisprofissionais;

    /**
     * @var \Servicos
     *
     * @ORM\ManyToOne(targetEntity="Servicos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="servicos_idServico", referencedColumnName="idServico")
     * })
     */
    private $servicosservico;

    /**
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Usuarios_idUsuarios", referencedColumnName="idUsuarios")
     * })
     */
    private $usuariosusuarios;

    function getIdsolicitacoes() {
        return $this->idsolicitacoes;
    }

    function getStatussolicitacao() {
        return $this->statussolicitacao;
    }

    function getDescricaosolicitacao() {
        return $this->descricaosolicitacao;
    }

    function getDtsolicitacao() {
        return $this->dtsolicitacao;
    }

    function getPrecofinal() {
        return $this->precofinal;
    }

    function getTempochegada() {
        return $this->tempochegada;
    }

    function getTrocapreco() {
        return $this->trocapreco;
    }

    function getTrocaprecoautorizada() {
        return $this->trocaprecoautorizada;
    }

    function getMotivotrocapreco() {
        return $this->motivotrocapreco;
    }

    function getNovovalor() {
        return $this->novovalor;
    }

    function getProfissionaisprofissionais() {
        return $this->profissionaisprofissionais;
    }

    function getServicosservico() {
        return $this->servicosservico;
    }

    function getUsuariosusuarios() {
        return $this->usuariosusuarios;
    }

    function setIdsolicitacoes($idsolicitacoes) {
        $this->idsolicitacoes = $idsolicitacoes;
    }

    function setStatussolicitacao($statussolicitacao) {
        $this->statussolicitacao = $statussolicitacao;
    }

    function setDescricaosolicitacao($descricaosolicitacao) {
        $this->descricaosolicitacao = $descricaosolicitacao;
    }

    function setDtsolicitacao(\DateTime $dtsolicitacao) {
        $this->dtsolicitacao = $dtsolicitacao;
    }

    function setPrecofinal($precofinal) {
        $this->precofinal = $precofinal;
    }

    function setTempochegada($tempochegada) {
        $this->tempochegada = $tempochegada;
    }

    function setTrocapreco($trocapreco) {
        $this->trocapreco = $trocapreco;
    }

    function setTrocaprecoautorizada($trocaprecoautorizada) {
        $this->trocaprecoautorizada = $trocaprecoautorizada;
    }

    function setMotivotrocapreco($motivotrocapreco) {
        $this->motivotrocapreco = $motivotrocapreco;
    }

    function setNovovalor($novovalor) {
        $this->novovalor = $novovalor;
    }

    function setProfissionaisprofissionais(Profissionais $profissionaisprofissionais) {
        $this->profissionaisprofissionais = $profissionaisprofissionais;
    }

    function setServicosservico(Servicos $servicosservico) {
        $this->servicosservico = $servicosservico;
    }

    function setUsuariosusuarios(Usuarios $usuariosusuarios) {
        $this->usuariosusuarios = $usuariosusuarios;
    }
    function getAvaliacao() {
        return $this->avaliacao;
    }

    function setAvaliacao($avaliacao) {
        $this->avaliacao = $avaliacao;
    }


}
