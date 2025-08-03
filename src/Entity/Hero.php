<?php

namespace App\Entity;

use App\Repository\HeroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HeroRepository::class)]
class Hero
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    private ?string $identiteSecrete = null;

    #[ORM\Column(type: 'text')]
    private ?string $pouvoirs = null;

    #[ORM\Column(length: 100)]
    private ?string $equipe = null;

    #[ORM\Column(type: 'integer')]
    private ?int $puissance = null;

    #[ORM\Column(length: 255)]
    private ?string $imageUrl = null;

    #[ORM\Column(type: 'boolean')]
    private bool $favori = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): void
    {
        $this->nom = $nom;
    }

    public function getIdentiteSecrete(): ?string
    {
        return $this->identiteSecrete;
    }

    public function setIdentiteSecrete(?string $identiteSecrete): void
    {
        $this->identiteSecrete = $identiteSecrete;
    }

    public function getPouvoirs(): ?string
    {
        return $this->pouvoirs;
    }

    public function setPouvoirs(?string $pouvoirs): void
    {
        $this->pouvoirs = $pouvoirs;
    }

    public function getEquipe(): ?string
    {
        return $this->equipe;
    }

    public function setEquipe(?string $equipe): void
    {
        $this->equipe = $equipe;
    }

    public function getPuissance(): ?int
    {
        return $this->puissance;
    }

    public function setPuissance(?int $puissance): void
    {
        $this->puissance = $puissance;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(?string $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }

    public function isFavori(): bool
    {
        return $this->favori;
    }

    public function setFavori(bool $favori): void
    {
        $this->favori = $favori;
    }

}
