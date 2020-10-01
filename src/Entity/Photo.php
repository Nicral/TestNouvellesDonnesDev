<?php

namespace App\Entity;

use App\Repository\PhotoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PhotoRepository::class)
 */
class Photo
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
    private $nom_photo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPhoto(): ?string
    {
        return $this->nom_photo;
    }

    public function setNomPhoto(string $nom_photo): self
    {
        $this->nom_photo = $nom_photo;

        return $this;
    }
    public function __toString()
    {
        return $this->getNomPhoto();
    }
}
