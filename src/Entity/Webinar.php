<?php

namespace App\Entity;

use App\Repository\WebinarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WebinarRepository::class)]
class Webinar
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $presenter = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_time = null;

    #[ORM\Column]
    private ?int $duration = null;

    #[ORM\Column(length: 255)]
    private ?string $category = null;

    #[ORM\Column(length: 255)]
    private ?string $tags = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $registration_required = null;

    #[ORM\Column]
    private ?int $max_attendees = null;

    #[ORM\Column(length: 255)]
    private ?string $platform = null;

    #[ORM\Column(length: 255)]
    private ?string $webinar_link = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $recording_available = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdat = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $updatedat = null;

    /**
     * @var Collection<int, InscriptionWebinar>
     */
    #[ORM\OneToMany(targetEntity: InscriptionWebinar::class, mappedBy: 'webinar_id', orphanRemoval: true)]
    private Collection $inscriptionWebinars;

    public function __construct()
    {
        $this->inscriptionWebinars = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPresenter(): ?string
    {
        return $this->presenter;
    }

    public function setPresenter(string $presenter): static
    {
        $this->presenter = $presenter;

        return $this;
    }

    public function getDateTime(): ?\DateTimeInterface
    {
        return $this->date_time;
    }

    public function setDateTime(\DateTimeInterface $date_time): static
    {
        $this->date_time = $date_time;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getTags(): ?string
    {
        return $this->tags;
    }

    public function setTags(string $tags): static
    {
        $this->tags = $tags;

        return $this;
    }

    public function getRegistrationRequired(): ?int
    {
        return $this->registration_required;
    }

    public function setRegistrationRequired(int $registration_required): static
    {
        $this->registration_required = $registration_required;

        return $this;
    }

    public function getMaxAttendees(): ?int
    {
        return $this->max_attendees;
    }

    public function setMaxAttendees(int $max_attendees): static
    {
        $this->max_attendees = $max_attendees;

        return $this;
    }

    public function getPlatform(): ?string
    {
        return $this->platform;
    }

    public function setPlatform(string $platform): static
    {
        $this->platform = $platform;

        return $this;
    }

    public function getWebinarLink(): ?string
    {
        return $this->webinar_link;
    }

    public function setWebinarLink(string $webinar_link): static
    {
        $this->webinar_link = $webinar_link;

        return $this;
    }

    public function getRecordingAvailable(): ?int
    {
        return $this->recording_available;
    }

    public function setRecordingAvailable(int $recording_available): static
    {
        $this->recording_available = $recording_available;

        return $this;
    }

    public function getCreatedat(): ?\DateTimeInterface
    {
        return $this->createdat;
    }

    public function setCreatedat(\DateTimeInterface $createdat): static
    {
        $this->createdat = $createdat;

        return $this;
    }

    public function getUpdatedat(): ?\DateTimeInterface
    {
        return $this->updatedat;
    }

    public function setUpdatedat(\DateTimeInterface $updatedat): static
    {
        $this->updatedat = $updatedat;

        return $this;
    }

    /**
     * @return Collection<int, InscriptionWebinar>
     */
    public function getInscriptionWebinars(): Collection
    {
        return $this->inscriptionWebinars;
    }

    public function addInscriptionWebinar(InscriptionWebinar $inscriptionWebinar): static
    {
        if (!$this->inscriptionWebinars->contains($inscriptionWebinar)) {
            $this->inscriptionWebinars->add($inscriptionWebinar);
            $inscriptionWebinar->setWebinarId($this);
        }

        return $this;
    }

    public function removeInscriptionWebinar(InscriptionWebinar $inscriptionWebinar): static
    {
        if ($this->inscriptionWebinars->removeElement($inscriptionWebinar)) {
            // set the owning side to null (unless already changed)
            if ($inscriptionWebinar->getWebinarId() === $this) {
                $inscriptionWebinar->setWebinarId(null);
            }
        }

        return $this;
    }
}
