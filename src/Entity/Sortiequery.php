<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sortiequery
 *
 * @ORM\Table(name="Sortie", indexes={@ORM\Index(name="fk_Ssrtie_car", columns={"matrc"})})
 * @ORM\Entity
 */
class Sortiequery
{
    
    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\Column(name="dateS", type="string", nullable=false)
     */
    private $dates;

    /**
     * @var string
     * 
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\Column(name="heureS", type="string", nullable=false)
     */
    private $heures;

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

    public function getDatee(): ?string
    {
        return $this->dates;
    }

    public function getHeuree(): ?string
    {
        return $this->heures;
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

    public function setDateS(string $dates): self
    {
        $this->dates = $dates;

        return $this;
    }

    
    public function setHeureS(string $heures): self
    {
        $this->heures = $heures;

        return $this;
    }

}
