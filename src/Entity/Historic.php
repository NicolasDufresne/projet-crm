<?php

namespace App\Entity;

use App\Repository\HistoricRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HistoricRepository::class)
 */
class Historic
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Ticket::class, inversedBy="historic_id")
     */
    private $ticket_id;

    public function __construct()
    {
        $this->ticket_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
}
