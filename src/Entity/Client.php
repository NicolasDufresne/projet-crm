<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity=Exchange::class, mappedBy="client_id")
     */
    private $exchange_id;

    /**
     * @ORM\OneToMany(targetEntity=Invoice::class, mappedBy="client_id")
     */
    private $invoice_id;

    /**
     * @ORM\OneToMany(targetEntity=Appointment::class, mappedBy="client_id")
     */
    private $appointment_id;

    /**
     * @ORM\OneToMany(targetEntity=Quotation::class, mappedBy="client_id")
     */
    private $quotation_id;

    public function __construct()
    {
        $this->exchange_id = new ArrayCollection();
        $this->invoice_id = new ArrayCollection();
        $this->appointment_id = new ArrayCollection();
        $this->quotation_id = new ArrayCollection();
    }

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

    /**
     * @return Collection|Exchange[]
     */
    public function getExchangeId(): Collection
    {
        return $this->exchange_id;
    }

    public function addExchangeId(Exchange $exchangeId): self
    {
        if (!$this->exchange_id->contains($exchangeId)) {
            $this->exchange_id[] = $exchangeId;
            $exchangeId->setClientId($this);
        }

        return $this;
    }

    public function removeExchangeId(Exchange $exchangeId): self
    {
        if ($this->exchange_id->removeElement($exchangeId)) {
            // set the owning side to null (unless already changed)
            if ($exchangeId->getClientId() === $this) {
                $exchangeId->setClientId(null);
            }
        }

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
            $invoiceId->setClientId($this);
        }

        return $this;
    }

    public function removeInvoiceId(Invoice $invoiceId): self
    {
        if ($this->invoice_id->removeElement($invoiceId)) {
            // set the owning side to null (unless already changed)
            if ($invoiceId->getClientId() === $this) {
                $invoiceId->setClientId(null);
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
            $appointmentId->setClientId($this);
        }

        return $this;
    }

    public function removeAppointmentId(Appointment $appointmentId): self
    {
        if ($this->appointment_id->removeElement($appointmentId)) {
            // set the owning side to null (unless already changed)
            if ($appointmentId->getClientId() === $this) {
                $appointmentId->setClientId(null);
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
            $quotationId->setClientId($this);
        }

        return $this;
    }

    public function removeQuotationId(Quotation $quotationId): self
    {
        if ($this->quotation_id->removeElement($quotationId)) {
            // set the owning side to null (unless already changed)
            if ($quotationId->getClientId() === $this) {
                $quotationId->setClientId(null);
            }
        }

        return $this;
    }
}
