<?php

namespace App\Entity;

use App\Repository\ExchangeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExchangeRepository::class)
 */
class Exchange
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
    private $type;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $detail;


    /**
     * @ORM\OneToMany(targetEntity=Ticket::class, mappedBy="Exchange_id")
     */
    private $ticket_id;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="exchange_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client_id;


    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="exchange_id")
     */
    private $user_id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function __construct()
    {
        $this->ticket_id = new ArrayCollection();
        $this->user_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(?string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * @return Collection|Ticket[]
     */
    public function getTicketId(): Collection
    {
        return $this->ticket_id;
    }

    public function addTicketId(Ticket $ticketId): self
    {
        if (!$this->ticket_id->contains($ticketId)) {
            $this->ticket_id[] = $ticketId;
            $ticketId->setExchangeId($this);
        }

        return $this;
    }

    public function removeTicketId(Ticket $ticketId): self
    {
        if ($this->ticket_id->removeElement($ticketId)) {
            // set the owning side to null (unless already changed)
            if ($ticketId->getExchangeId() === $this) {
                $ticketId->setExchangeId(null);
            }
        }

        return $this;
    }

    public function getClientId(): ?Client
    {
        return $this->client_id;
    }

    public function setClientId(?Client $client_id): self
    {
        $this->client_id = $client_id;

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

    public function __toString()
    {
        return (string) $this->user_id;

    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

}
