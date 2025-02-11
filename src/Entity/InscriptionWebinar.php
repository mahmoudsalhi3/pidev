<?php

namespace App\Entity;

use App\Repository\InscriptionWebinarRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionWebinarRepository::class)]
class InscriptionWebinar
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?utilisateur $user_id = null;

    #[ORM\ManyToOne(inversedBy: 'inscriptionWebinars')]
    #[ORM\JoinColumn(nullable: false)]
    private ?webinar $webinar_id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $registered_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?utilisateur
    {
        return $this->user_id;
    }

    public function setUserId(?utilisateur $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getWebinarId(): ?webinar
    {
        return $this->webinar_id;
    }

    public function setWebinarId(?webinar $webinar_id): static
    {
        $this->webinar_id = $webinar_id;

        return $this;
    }

    public function getRegisteredAt(): ?\DateTimeImmutable
    {
        return $this->registered_at;
    }

    public function setRegisteredAt(\DateTimeImmutable $registered_at): static
    {
        $this->registered_at = $registered_at;

        return $this;
    }
}
