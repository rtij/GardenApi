<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entrer
 *
 * @ORM\Table(name="Entrer", indexes={@ORM\Index(name="fk_entrer_car", columns={"matrc"})})
 * @ORM\Entity(repositoryClass="App\Repository\EntrerRepository")
 */
class Entrer
{
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateE", type="date", nullable=false, options={"default"="CURRENT_DATE"})
     */
    private $datee;

    /**
     * @var \DateTime
     *
    * @ORM\Column(name="heureE", type="time", nullable=false, options={"default"="CURRENT_DATE"})
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

    public function getDatee(): ?\DateTimeInterface
    {
        return $this->datee;
    }

    public function getHeuree(): ?\DateTimeInterface
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

    
    public function setDateE(\DateTimeInterface $datee): self
    {
        $this->datee = $datee;

        return $this;
    }

    
    public function setHeureE(\DateTimeInterface $heuree): self
    {
        $this->heuree = $heuree;

        return $this;
    }

}
