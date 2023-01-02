<?php

namespace App\Entity;

use App\Repository\RqthRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RqthRepository::class)
 */
class Rqth
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="boolean")
     */
    private $rqth;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="rqths")
     */
    private $utilisateur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function isRqth(): ?bool
    {
        return $this->rqth;
    }

    public function setRqth(bool $rqth): self
    {
        $this->rqth = $rqth;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
