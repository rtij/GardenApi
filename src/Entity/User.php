<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="User")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="emailu", type="string", length=250 ,nullable=false)
     * @ORM\Id
     */
    private $emailu;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=250, nullable=false)
     */
    private $password;


    public function getEmailu(): ?string
    {
        return $this->emailu;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setEmailu(string $emailu): self
    {
        $this->emailu = $emailu;

        return $this;
    }

    public function setPasswrod(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(){
        return [];
    }

    public function getSalt()
    {
        return null;
    }
    public function eraseCredentials()
    {
        
    }
    public function getUsername()
    {
        return $this->emailu;
    }
}
