<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
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
     * @ORM\OneToMany(targetEntity=Ticket::class, mappedBy="category_id")
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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
            $ticketId->setCategoryId($this);
        }

        return $this;
    }

    public function removeTicketId(ticket $ticketId): self
    {
        if ($this->ticket_id->removeElement($ticketId)) {
            // set the owning side to null (unless already changed)
            if ($ticketId->getCategoryId() === $this) {
                $ticketId->setCategoryId(null);
            }
        }

        return $this;
    }
}
