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

    /**
     * @ORM\ManyToOne(targetEntity=Ticket::class, inversedBy="invoice_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ticket_id;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="invoice_id")
     */
    private $client_id;

    /**
     * @ORM\ManyToOne(targetEntity=Compagny::class, inversedBy="invoice_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $compagny_id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="invoice_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_id;

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

    public function getTicketId(): ?ticket
    {
        return $this->ticket_id;
    }

    public function setTicketId(?ticket $ticket_id): self
    {
        $this->ticket_id = $ticket_id;

        return $this;
    }

    public function getClientId(): ?client
    {
        return $this->client_id;
    }

    public function setClientId(?client $client_id): self
    {
        $this->client_id = $client_id;

        return $this;
    }

    public function getCompagnyId(): ?compagny
    {
        return $this->compagny_id;
    }

    public function setCompagnyId(?compagny $compagny_id): self
    {
        $this->compagny_id = $compagny_id;

        return $this;
    }

    public function getUserId(): ?user
    {
        return $this->user_id;
    }

    public function setUserId(?user $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }
}
