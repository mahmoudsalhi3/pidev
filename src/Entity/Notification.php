<?php

namespace App\Entity;

use App\Repository\NotificationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotificationRepository::class)]
class Notification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $message = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateenvoi = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\ManyToOne(inversedBy: 'notifications')]
    private ?utilisateur $iduser = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getDateenvoi(): ?\DateTimeImmutable
    {
        return $this->dateenvoi;
    }

    public function setDateenvoi(\DateTimeImmutable $dateenvoi): static
    {
        $this->dateenvoi = $dateenvoi;

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

    public function getIduser(): ?utilisateur
    {
        return $this->iduser;
    }

    public function setIduser(?utilisateur $iduser): static
    {
        $this->iduser = $iduser;

        return $this;
    }
}
