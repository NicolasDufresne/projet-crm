<?php

namespace App\Entity;

use App\Repository\CompagnyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompagnyRepository::class)
 */
class Compagny
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
    private $name;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $send_adress;

    /**
     * @ORM\Column(type="float")
     */
    private $TVA;

    /**
     * @ORM\Column(type="float")
     */
    private $NAF;

    /**
     * @ORM\Column(type="float")
     */
    private $SIRET;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getSendAdress(): ?string
    {
        return $this->send_adress;
    }

    public function setSendAdress(string $send_adress): self
    {
        $this->send_adress = $send_adress;

        return $this;
    }

    public function getTVA(): ?float
    {
        return $this->TVA;
    }

    public function setTVA(float $TVA): self
    {
        $this->TVA = $TVA;

        return $this;
    }

    public function getNAF(): ?float
    {
        return $this->NAF;
    }

    public function setNAF(float $NAF): self
    {
        $this->NAF = $NAF;

        return $this;
    }

    public function getSIRET(): ?float
    {
        return $this->SIRET;
    }

    public function setSIRET(float $SIRET): self
    {
        $this->SIRET = $SIRET;

        return $this;
    }
}
