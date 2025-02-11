<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionRepository::class)]
class Inscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateinscription = null;

    #[ORM\ManyToOne(inversedBy: 'inscriptions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?cours $idcours = null;

    #[ORM\ManyToOne(inversedBy: 'inscriptions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?utilisateur $iduser = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateinscription(): ?\DateTimeImmutable
    {
        return $this->dateinscription;
    }

    public function setDateinscription(\DateTimeImmutable $dateinscription): static
    {
        $this->dateinscription = $dateinscription;

        return $this;
    }

    public function getIdcours(): ?cours
    {
        return $this->idcours;
    }

    public function setIdcours(?cours $idcours): static
    {
        $this->idcours = $idcours;

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
