<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity
 */
class Client
{
    /**
     * @var int
     *
     * @ORM\Column(name="idclient", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idclient;

    /**
     * @var string
     *
     * @ORM\Column(name="nomcl", type="string", length=250, nullable=false)
     */
    private $nomcl;

    /**
     * @var string
     *
     * @ORM\Column(name="adrcl", type="string", length=250, nullable=false)
     */

    private $adrcl;
    
    /**
     * @var string
     *
     * @ORM\Column(name="telcl", type="string", length=250, nullable=true)
     */
    private $telcl;

    /**
     * @var bool
     *
     * @ORM\Column(name="client_sup", type="boolean", nullable=false)
     */
    private $clientSup;

    public function getIdclient(): ?int
    {
        return $this->idclient;
    }

    public function getNomcl(): ?string
    {
        return $this->nomcl;
    }

    public function setNomcl(string $nomcl): self
    {
        $this->nomcl = $nomcl;

        return $this;
    }

    public function getAdrcl(): ?string
    {
        return $this->adrcl;
    }

    public function setAdrcl(string $adrcl): self
    {
        $this->adrcl = $adrcl;

        return $this;
    }

    public function getTelcl(): ?string
    {
        return $this->telcl;
    }

    public function setTelcl(string $Telcl): self
    {
        $this->telcl = $Telcl;

        return $this;
    }


    public function getClientSup(): ?bool
    {
        return $this->clientSup;
    }

    public function setClientSup(bool $clientSup): self
    {
        $this->clientSup = $clientSup;

        return $this;
    }

}
