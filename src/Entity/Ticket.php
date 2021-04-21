<?php

namespace App\Entity;

use App\Repository\TicketRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TicketRepository::class)
 */
class Ticket
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
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $details;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=Exchange::class, inversedBy="ticket_id")
     * @ORM\JoinColumn(nullable=true)
     */
    private $Exchange_id;

    /**
     * @ORM\OneToMany(targetEntity=Invoice::class, mappedBy="ticket_id")
     */
    private $invoice_id;

    /**
     * @ORM\OneToMany(targetEntity=Appointment::class, mappedBy="ticket_id")
     */
    private $appointment_id;

    /**
     * @ORM\ManyToMany(targetEntity=Quotation::class, mappedBy="ticket_id")
     */
    private $quotation_id;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="ticket_id")
     */
    private $category_id;

    /**
     * @ORM\ManyToMany(targetEntity=Historic::class, mappedBy="ticket_id")
     */
    private $historic_id;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    public function __construct()
    {
        $this->invoice_id = new ArrayCollection();
        $this->appointment_id = new ArrayCollection();
        $this->quotation_id = new ArrayCollection();
        $this->historic_id = new ArrayCollection();
    }

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

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(?string $details): self
    {
        $this->details = $details;

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

    public function getExchangeId(): ?Exchange
    {
        return $this->Exchange_id;
    }

    public function setExchangeId(?Exchange $Exchange_id): self
    {
        $this->Exchange_id = $Exchange_id;

        return $this;
    }

    /**
     * @return Collection|Invoice[]
     */
    public function getInvoiceId(): Collection
    {
        return $this->invoice_id;
    }

    public function addInvoiceId(Invoice $invoiceId): self
    {
        if (!$this->invoice_id->contains($invoiceId)) {
            $this->invoice_id[] = $invoiceId;
            $invoiceId->setTicketId($this);
        }

        return $this;
    }

    public function removeInvoiceId(Invoice $invoiceId): self
    {
        if ($this->invoice_id->removeElement($invoiceId)) {
            // set the owning side to null (unless already changed)
            if ($invoiceId->getTicketId() === $this) {
                $invoiceId->setTicketId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Appointment[]
     */
    public function getAppointmentId(): Collection
    {
        return $this->appointment_id;
    }

    public function addAppointmentId(Appointment $appointmentId): self
    {
        if (!$this->appointment_id->contains($appointmentId)) {
            $this->appointment_id[] = $appointmentId;
            $appointmentId->setTicketId($this);
        }

        return $this;
    }

    public function removeAppointmentId(Appointment $appointmentId): self
    {
        if ($this->appointment_id->removeElement($appointmentId)) {
            // set the owning side to null (unless already changed)
            if ($appointmentId->getTicketId() === $this) {
                $appointmentId->setTicketId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Quotation[]
     */
    public function getQuotationId(): Collection
    {
        return $this->quotation_id;
    }

    public function addQuotationId(Quotation $quotationId): self
    {
        if (!$this->quotation_id->contains($quotationId)) {
            $this->quotation_id[] = $quotationId;
            $quotationId->addTicketId($this);
        }

        return $this;
    }

    public function removeQuotationId(Quotation $quotationId): self
    {
        if ($this->quotation_id->removeElement($quotationId)) {
            $quotationId->removeTicketId($this);
        }

        return $this;
    }

    public function getCategoryId(): ?Category
    {
        return $this->category_id;
    }

    public function setCategoryId(?Category $category_id): self
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * @return Collection|Historic[]
     */
    public function getHistoricId(): Collection
    {
        return $this->historic_id;
    }

    public function addHistoricId(Historic $historicId): self
    {
        if (!$this->historic_id->contains($historicId)) {
            $this->historic_id[] = $historicId;
            $historicId->addTicketId($this);
        }

        return $this;
    }

    public function removeHistoricId(Historic $historicId): self
    {
        if ($this->historic_id->removeElement($historicId)) {
            $historicId->removeTicketId($this);
        }

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }
}
