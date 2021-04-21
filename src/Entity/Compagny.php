<?php

namespace App\Entity;

use App\Repository\CompagnyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity=Exchange::class, mappedBy="compagny_id")
     */
    private $exchange_id;

    /**
     * @ORM\OneToMany(targetEntity=Invoice::class, mappedBy="compagny_id")
     */
    private $invoice_id;

    /**
     * @ORM\OneToMany(targetEntity=Appointment::class, mappedBy="compagny_id")
     */
    private $appointment_id;

    /**
     * @ORM\OneToMany(targetEntity=Quotation::class, mappedBy="compagny_id")
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
            $exchangeId->setCompagnyId($this);
        }

        return $this;
    }

    public function removeExchangeId(Exchange $exchangeId): self
    {
        if ($this->exchange_id->removeElement($exchangeId)) {
            // set the owning side to null (unless already changed)
            if ($exchangeId->getCompagnyId() === $this) {
                $exchangeId->setCompagnyId(null);
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
            $invoiceId->setCompagnyId($this);
        }

        return $this;
    }

    public function removeInvoiceId(Invoice $invoiceId): self
    {
        if ($this->invoice_id->removeElement($invoiceId)) {
            // set the owning side to null (unless already changed)
            if ($invoiceId->getCompagnyId() === $this) {
                $invoiceId->setCompagnyId(null);
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
            $appointmentId->setCompagnyId($this);
        }

        return $this;
    }

    public function removeAppointmentId(Appointment $appointmentId): self
    {
        if ($this->appointment_id->removeElement($appointmentId)) {
            // set the owning side to null (unless already changed)
            if ($appointmentId->getCompagnyId() === $this) {
                $appointmentId->setCompagnyId(null);
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
            $quotationId->setCompagnyId($this);
        }

        return $this;
    }

    public function removeQuotationId(Quotation $quotationId): self
    {
        if ($this->quotation_id->removeElement($quotationId)) {
            // set the owning side to null (unless already changed)
            if ($quotationId->getCompagnyId() === $this) {
                $quotationId->setCompagnyId(null);
            }
        }

        return $this;
    }


    public function __toString()
    {
        return $this->name;
    }
}
