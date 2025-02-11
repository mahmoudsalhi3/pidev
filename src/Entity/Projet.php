<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetRepository::class)]
class Projet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $project_id = null;

    #[ORM\Column(length: 255)]
    private ?string $project_name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $start_date = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $end_date = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column]
    private ?int $owner_user_id = null;

    /**
     * @var Collection<int, ScoreProjet>
     */
    #[ORM\OneToMany(targetEntity: ScoreProjet::class, mappedBy: 'project_id', orphanRemoval: true)]
    private Collection $scoreProjets;

    public function __construct()
    {
        $this->scoreProjets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getProjectId(): ?int
    {
        return $this->project_id;
    }

    public function setProjectId(int $project_id): static
    {
        $this->project_id = $project_id;

        return $this;
    }

    public function getProjectName(): ?string
    {
        return $this->project_name;
    }

    public function setProjectName(string $project_name): static
    {
        $this->project_name = $project_name;

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

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): static
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(\DateTimeInterface $end_date): static
    {
        $this->end_date = $end_date;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getOwnerUserId(): ?int
    {
        return $this->owner_user_id;
    }

    public function setOwnerUserId(int $owner_user_id): static
    {
        $this->owner_user_id = $owner_user_id;

        return $this;
    }

    /**
     * @return Collection<int, ScoreProjet>
     */
    public function getScoreProjets(): Collection
    {
        return $this->scoreProjets;
    }

    public function addScoreProjet(ScoreProjet $scoreProjet): static
    {
        if (!$this->scoreProjets->contains($scoreProjet)) {
            $this->scoreProjets->add($scoreProjet);
            $scoreProjet->setProjectId($this);
        }

        return $this;
    }

    public function removeScoreProjet(ScoreProjet $scoreProjet): static
    {
        if ($this->scoreProjets->removeElement($scoreProjet)) {
            // set the owning side to null (unless already changed)
            if ($scoreProjet->getProjectId() === $this) {
                $scoreProjet->setProjectId(null);
            }
        }

        return $this;
    }
}
