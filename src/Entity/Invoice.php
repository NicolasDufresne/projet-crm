<?php

namespace App\Entity;

use App\Repository\InvoiceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InvoiceRepository::class)
 */
class Invoice
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
    private $ref;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $status;

    /**
     * @ORM\Column(type="float")
     */
    private $TVA;

    /**
     * @ORM\Column(type="float")
     */
    private $TTC;

    /**
     * @ORM\Column(type="float")
     */
    private $HT;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;

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

    public function getTVA(): ?int
    {
        return $this->TVA;
    }

    public function setTVA(int $TVA): self
    {
        $this->TVA = $TVA;

        return $this;
    }

    public function getTTC(): ?float
    {
        return $this->TTC;
    }

    public function setTTC(float $TTC): self
    {
        $this->TTC = $TTC;

        return $this;
    }

    public function getHT(): ?float
    {
        return $this->HT;
    }

    public function setHT(float $HT): self
    {
        $this->HT = $HT;

        return $this;
    }
}
