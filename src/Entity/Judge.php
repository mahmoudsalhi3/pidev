<?php

namespace App\Entity;

use App\Repository\JudgeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JudgeRepository::class)]
class Judge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $judge_id = null;

    #[ORM\Column(length: 255)]
    private ?string $judge_name = null;

    #[ORM\Column(length: 255)]
    private ?string $judge_email = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJudgeId(): ?int
    {
        return $this->judge_id;
    }

    public function setJudgeId(int $judge_id): static
    {
        $this->judge_id = $judge_id;

        return $this;
    }

    public function getJudgeName(): ?string
    {
        return $this->judge_name;
    }

    public function setJudgeName(string $judge_name): static
    {
        $this->judge_name = $judge_name;

        return $this;
    }

    public function getJudgeEmail(): ?string
    {
        return $this->judge_email;
    }

    public function setJudgeEmail(string $judge_email): static
    {
        $this->judge_email = $judge_email;

        return $this;
    }
}
