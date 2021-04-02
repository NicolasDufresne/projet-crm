<?php

namespace App\Entity;

use App\Repository\QuotationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuotationRepository::class)
 */
class Quotation
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
     * @ORM\ManyToMany(targetEntity=Ticket::class, inversedBy="quotation_id")
     */
    private $ticket_id;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="quotation_id")
     */
    private $client_id;

    /**
     * @ORM\ManyToOne(targetEntity=Compagny::class, inversedBy="quotation_id")
     */
    private $compagny_id;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="quotation_id")
     */
    private $user_id;

    public function __construct()
    {
        $this->ticket_id = new ArrayCollection();
        $this->user_id = new ArrayCollection();
    }

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

    public function getTVA(): ?float
    {
        return $this->TVA;
    }

    public function setTVA(float $TVA): self
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

    /**
     * @return Collection|ticket[]
     */
    public function getTicketId(): Collection
    {
        return $this->ticket_id;
    }

    public function addTicketId(ticket $ticketId): self
    {
        if (!$this->ticket_id->contains($ticketId)) {
            $this->ticket_id[] = $ticketId;
        }

        return $this;
    }

    public function removeTicketId(ticket $ticketId): self
    {
        $this->ticket_id->removeElement($ticketId);

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

    /**
     * @return Collection|user[]
     */
    public function getUserId(): Collection
    {
        return $this->user_id;
    }

    public function addUserId(user $userId): self
    {
        if (!$this->user_id->contains($userId)) {
            $this->user_id[] = $userId;
        }

        return $this;
    }

    public function removeUserId(user $userId): self
    {
        $this->user_id->removeElement($userId);

        return $this;
    }
}
