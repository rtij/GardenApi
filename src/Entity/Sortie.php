<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sortie
 *
 * @ORM\Table(name="sortie", indexes={@ORM\Index(name="fk_Ssrtie_car", columns={"matrc"})})
 * @ORM\Entity(repositoryClass="App\Repository\SortieRepository")
 */
class Sortie
{
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateS", type="date", nullable=false, options={"default"="CURRENT_DATE"})
     */
    private $dates;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureS", type="time", nullable=false)
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

    public function getDatee(): ?\DateTimeInterface
    {
        return $this->dates;
    }

    public function getHeuree(): ?\DateTimeInterface
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

    public function setDateS(\DateTimeInterface $dates): self
    {
        $this->dates = $dates;

        return $this;
    }

    
    public function setHeureS(\DateTimeInterface $heures): self
    {
        $this->heures = $heures;

        return $this;
    }

}
