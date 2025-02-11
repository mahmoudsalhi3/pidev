<?php

namespace App\Entity;

use App\Repository\ScoreProjetRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScoreProjetRepository::class)]
class ScoreProjet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $score_id = null;

    #[ORM\ManyToOne(inversedBy: 'scoreProjets')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Projet $project_id = null;

    #[ORM\OneToOne(inversedBy: 'scoreProjet', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Judge $judge_id = null;

    #[ORM\Column]
    private ?int $score = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $feedback = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $score_date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScoreId(): ?int
    {
        return $this->score_id;
    }

    public function setScoreId(int $score_id): static
    {
        $this->score_id = $score_id;
        return $this;
    }

    public function getProjectId(): ?Projet
    {
        return $this->project_id;
    }

    public function setProjectId(?Projet $project_id): static
    {
        $this->project_id = $project_id;
        return $this;
    }

    public function getJudgeId(): ?Judge
    {
        return $this->judge_id;
    }

    public function setJudgeId(Judge $judge_id): static
    {
        $this->judge_id = $judge_id;
        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): static
    {
        $this->score = $score;
        return $this;
    }

    public function getFeedback(): ?string
    {
        return $this->feedback;
    }

    public function setFeedback(string $feedback): static
    {
        $this->feedback = $feedback;
        return $this;
    }

    public function getScoreDate(): ?\DateTimeInterface
    {
        return $this->score_date;
    }

    public function setScoreDate(\DateTimeInterface $score_date): static
    {
        $this->score_date = $score_date;
        return $this;
    }
}
