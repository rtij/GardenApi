<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Andrana
 *
 * @ORM\Table(name="Entrer", indexes={@ORM\Index(name="fk_entrer_car", columns={"matrc"})})
 * @ORM\Entity
 */
class Andrana
{
    
    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE") 
     * @ORM\Column(name="dateE", type="string", nullable=false)
     */
    private $datee;

    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\Column(name="heureE", type="string", nullable=false)
     */
    private $heuree;

    /**
     * @var \Car
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="Car")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="matrc", referencedColumnName="matrC")
     * })
     */
    private $matrc;

    
    public function getDatee(): ?String
    {
        return $this->datee;
    }

    public function getHeuree(): ?String
    {
        return $this->heuree;
    }

    public function getMatrc(): ?Car
    {
        return $this->matrc;
    }

    public function setMatrc(?Car $matrc): self
    {
        $this->matrc = $matrc;

        return $this;
    }

    
    public function setDateE(?String $datee): self
    {
        $this->datee = $datee;

        return $this;
    }

    
    public function setHeureE(?String $heuree): self
    {
        $this->heuree = $heuree;

        return $this;
    }

}
