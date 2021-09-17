<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Garage
 *
 * @ORM\Table(name="garage", indexes={@ORM\Index(name="fk_garage_car", columns={"matrc"})})
 * @ORM\Entity(repositoryClass="App\Repository\GarageRepository")
 */
class Garage
{
    
    /**
     * @var \Car
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\ManyToOne(targetEntity="Car")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="matrc", referencedColumnName="matrC")
     * })
     */
    private $matrc;
    
    public function getMatrc(): ?Car
    {
        return $this->matrc;
    }

    public function setCar(Car $matrc): self
    {
        $this->matrc = $matrc;

        return $this;
    }


}
