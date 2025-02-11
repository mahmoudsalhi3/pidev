<?php

namespace App\Entity;

use App\Repository\QuestionquizRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionquizRepository::class)]
class Questionquiz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'questionquizzes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?quiz $quiz_id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $textquestion = null;

    #[ORM\Column]
    private ?int $nombrepoints = null;

    #[ORM\OneToOne(mappedBy: 'id_quiz', cascade: ['persist', 'remove'])]
    private ?Reponsequiz $reponsequiz = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuizId(): ?quiz
    {
        return $this->quiz_id;
    }

    public function setQuizId(?quiz $quiz_id): static
    {
        $this->quiz_id = $quiz_id;

        return $this;
    }

    public function getTextquestion(): ?string
    {
        return $this->textquestion;
    }

    public function setTextquestion(string $textquestion): static
    {
        $this->textquestion = $textquestion;

        return $this;
    }

    public function getNombrepoints(): ?int
    {
        return $this->nombrepoints;
    }

    public function setNombrepoints(int $nombrepoints): static
    {
        $this->nombrepoints = $nombrepoints;

        return $this;
    }

    public function getReponsequiz(): ?Reponsequiz
    {
        return $this->reponsequiz;
    }

    public function setReponsequiz(Reponsequiz $reponsequiz): static
    {
        // set the owning side of the relation if necessary
        if ($reponsequiz->getIdQuiz() !== $this) {
            $reponsequiz->setIdQuiz($this);
        }

        $this->reponsequiz = $reponsequiz;

        return $this;
    }
}
