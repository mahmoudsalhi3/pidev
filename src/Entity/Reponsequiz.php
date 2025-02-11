<?php

namespace App\Entity;

use App\Repository\ReponsequizRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReponsequizRepository::class)]
class Reponsequiz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'reponsequiz', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?questionquiz $id_quiz = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $reponsequiz = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdQuiz(): ?questionquiz
    {
        return $this->id_quiz;
    }

    public function setIdQuiz(questionquiz $id_quiz): static
    {
        $this->id_quiz = $id_quiz;

        return $this;
    }

    public function getReponsequiz(): ?string
    {
        return $this->reponsequiz;
    }

    public function setReponsequiz(string $reponsequiz): static
    {
        $this->reponsequiz = $reponsequiz;

        return $this;
    }
}
