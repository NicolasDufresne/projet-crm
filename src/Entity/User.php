<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    use TimestampableEntity;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

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
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $adress;

    /**
     * @ORM\ManyToMany(targetEntity=Exchange::class, mappedBy="user_id")
     */
    private $exchange_id;

    /**
     * @ORM\OneToMany(targetEntity=Invoice::class, mappedBy="user_id")
     */
    private $invoice_id;

    /**
     * @ORM\OneToMany(targetEntity=Appointment::class, mappedBy="user_id")
     */
    private $appointment_id;

    /**
     * @ORM\ManyToMany(targetEntity=Quotation::class, mappedBy="user_id")
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function setPhonenumber(string $phonenumber): self
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
            $exchangeId->addUserId($this);
        }

        return $this;
    }

    public function removeExchangeId(Exchange $exchangeId): self
    {
        if ($this->exchange_id->removeElement($exchangeId)) {
            $exchangeId->removeUserId($this);
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
            $invoiceId->setUserId($this);
        }

        return $this;
    }

    public function removeInvoiceId(Invoice $invoiceId): self
    {
        if ($this->invoice_id->removeElement($invoiceId)) {
            // set the owning side to null (unless already changed)
            if ($invoiceId->getUserId() === $this) {
                $invoiceId->setUserId(null);
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
            $appointmentId->setUserId($this);
        }

        return $this;
    }

    public function removeAppointmentId(Appointment $appointmentId): self
    {
        if ($this->appointment_id->removeElement($appointmentId)) {
            // set the owning side to null (unless already changed)
            if ($appointmentId->getUserId() === $this) {
                $appointmentId->setUserId(null);
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
            $quotationId->addUserId($this);
        }

        return $this;
    }

    public function removeQuotationId(Quotation $quotationId): self
    {
        if ($this->quotation_id->removeElement($quotationId)) {
            $quotationId->removeUserId($this);
        }

        return $this;
    }
}
