<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $phonenumber;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $CP;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $commitment;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getPhonenumber(): ?string
    {
        return $this->phonenumber;
    }

    public function setPhonenumber(?string $phonenumber): self
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getCP(): ?string
    {
        return $this->CP;
    }

    public function setCP(string $CP): self
    {
        $this->CP = $CP;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCommitment(): ?string
    {
        return $this->commitment;
    }

    public function setCommitment(string $commitment): self
    {
        $this->commitment = $commitment;

        return $this;
    }
}
