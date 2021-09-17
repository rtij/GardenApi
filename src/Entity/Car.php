<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Car
 *
 * @ORM\Table(name="car", indexes={@ORM\Index(name="fk_client_car", columns={"idclient"})})
 * @ORM\Entity(repositoryClass="App\Repository\CarRepository")
 */
class Car
{
    /**
     * @var string
     *
     * @ORM\Column(name="matrC", type="string", length=8, nullable=false)
     * @ORM\Id
     */
    private $matrc;

    /**
     * @var string
     *
     * @ORM\Column(name="nomV", type="string", length=255, nullable=false)
     */
    private $nomv;

    /**
     * @var string
     *
     * @ORM\Column(name="couleurC", type="string", length=20, nullable=false)
     */
    private $couleurc;

    
    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idclient", referencedColumnName="idclient")
     * })
     */
    private $idclient;
    
    /**
     * @var bool
     *
     * @ORM\Column(name="car_sup", type="boolean", nullable=false)
     */
    private $carSup;

    public function getMatrc(): ?string
    {
        return $this->matrc;
    }

    public function setMatrc(string $matrc): self
    {
        $this->matrc = $matrc;

        return $this;
    }

    public function getNomv(): ?string
    {
        return $this->nomv;
    }

    public function setNomv(string $nomv): self
    {
        $this->nomv = $nomv;

        return $this;
    }

    public function getCouleurc(): ?string
    {
        return $this->couleurc;
    }

    public function setCouleurc(string $couleurc): self
    {
        $this->couleurc = $couleurc;

        return $this;
    }

    public function getIdclient(): ?Client
    {
        return $this->idclient;
    }

    public function setIdclient(?Client $idclient): self
    {
        $this->idclient = $idclient;

        return $this;
    }

    public function getCarSup(): ?bool
    {
        return $this->carSup;
    }

    public function setCarSup(bool $carSup): self
    {
        $this->carSup = $carSup;

        return $this;
    }

}
