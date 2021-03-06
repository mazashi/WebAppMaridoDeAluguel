<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Profissionais;
/**
 * Enderecoatualprofissional
 *
 * @ORM\Table(name="enderecoatualprofissional", indexes={@ORM\Index(name="fk_EnderecoAtualProfissional_Profissionais1_idx", columns={"Profissionais_idProfissionais"})})
 * @ORM\Entity
 */
class Enderecoatualprofissional
{
    /**
     * @var int
     *
     * @ORM\Column(name="idEnderecoProfissional", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idenderecoprofissional;

    /**
     * @var string|null
     *
     * @ORM\Column(name="latitude", type="string", length=45, nullable=true)
     */
    private $latitude;

    /**
     * @var string|null
     *
     * @ORM\Column(name="longitude", type="string", length=45, nullable=true)
     */
    private $longitude;

    /**
     * @var string|null
     *
     * @ORM\Column(name="endereco", type="string", length=45, nullable=true)
     */
    private $endereco;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="atualizacao", type="datetime", nullable=true)
     */
    private $atualizacao;

    /**
     * @var \Profissionais
     *
     * @ORM\ManyToOne(targetEntity="Profissionais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Profissionais_idProfissionais", referencedColumnName="idProfissionais")
     * })
     */
    private $profissionaisprofissionais;
    function getIdenderecoprofissional() {
        return $this->idenderecoprofissional;
    }

    function getLatitude() {
        return $this->latitude;
    }

    function getLongitude() {
        return $this->longitude;
}

    function getEndereco() {
        return $this->endereco;
    }

    function getProfissionaisprofissionais() {
        return $this->profissionaisprofissionais;
    }

    function setIdenderecoprofissional($idenderecoprofissional) {
        $this->idenderecoprofissional = $idenderecoprofissional;
    }

    function setLatitude($latitude) {
        $this->latitude = $latitude;
    }

    function setLongitude($longitude) {
        $this->longitude = $longitude;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setProfissionaisprofissionais(Profissionais $profissionaisprofissionais) {
        $this->profissionaisprofissionais = $profissionaisprofissionais;
    }

    function getAtualizacao() {
        return $this->atualizacao;
    }

    function setAtualizacao(\DateTime $atualizacao) {
        $this->atualizacao = $atualizacao;
    }



}
