<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LivreRepository")
 */
class Livre
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Genre", inversedBy="livres")
     */
    private $genre;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lecteur", inversedBy="livres")
     */
    private $lecteur;

    /**
     * @ORM\Column(type="date")
     */
    private $datepret;

    /**
     * @ORM\Column(type="date")
     */
    private $dateretour;

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

    public function getGenre(): ?Genre
    {
        return $this->genre;
    }

    public function setGenre(?Genre $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getLecteur(): ?Lecteur
    {
        return $this->lecteur;
    }

    public function setLecteur(?Lecteur $lecteur): self
    {
        $this->lecteur = $lecteur;

        return $this;
    }

    public function getDatepret(): ?\DateTimeInterface
    {
        return $this->datepret;
    }

    public function setDatepret(\DateTimeInterface $datepret): self
    {
        $this->datepret = $datepret;

        return $this;
    }

    public function getDateretour(): ?\DateTimeInterface
    {
        return $this->dateretour;
    }

    public function setDateretour(\DateTimeInterface $dateretour): self
    {
        $this->dateretour = $dateretour;

        return $this;
    }
}
