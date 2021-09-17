<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Authtoken
 *
 * @ORM\Table(name="authtoken", indexes={@ORM\Index(name="fk_authtoken_user", columns={"emailu"})})
 * @ORM\Entity(repositoryClass="App\Repository\AuthtokenRepository")
 */
class Authtoken
{
    /**
     * @var int
     *
     * @ORM\Column(name="idtoken", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtoken;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255, nullable=false)
     */
    private $token;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="emailu", referencedColumnName="emailu")
     * })
     */
    private $emailu;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateT", type="date", nullable=false, options={"default"="CURRENT_DATE"})
     */
    private $datet = 'CURRENT_DATE';


    public function getIdtoken(): ?int
    {
        return $this->idtoken;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getEmailu(): ?User
    {
        return $this->emailu;
    }

    public function setEmailu(?User $emailu): self
    {
        $this->emailu = $emailu;

        return $this;
    }

    
    public function setDatet(\DateTimeInterface $datet): self
    {
        $this->datet = $datet;

        return $this;
    }

    public function getDatet(): ?\DateTimeInterface
    {
        return $this->datet;
    }

}
