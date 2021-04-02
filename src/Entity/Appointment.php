<?php

namespace App\Entity;

use App\Repository\AppointmentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AppointmentRepository::class)
 */
class Appointment
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
    private $object;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateTime;

    /**
     * @ORM\ManyToOne(targetEntity=Ticket::class, inversedBy="appointment_id")
     */
    private $ticket_id;

    /**
     * @ORM\ManyToOne(targetEntity=Compagny::class, inversedBy="appointment_id")
     */
    private $compagny_id;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="appointment_id")
     */
    private $client_id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="appointment_id")
     */
    private $user_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObject(): ?string
    {
        return $this->object;
    }

    public function setObject(string $object): self
    {
        $this->object = $object;

        return $this;
    }

    public function getDateTime(): ?\DateTimeInterface
    {
        return $this->dateTime;
    }

    public function setDateTime(?\DateTimeInterface $dateTime): self
    {
        $this->dateTime = $dateTime;

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

    public function getCompagnyId(): ?compagny
    {
        return $this->compagny_id;
    }

    public function setCompagnyId(?compagny $compagny_id): self
    {
        $this->compagny_id = $compagny_id;

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
