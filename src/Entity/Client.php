<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToOne(targetEntity=Photo::class, cascade={"persist", "remove"})
     */
    private $client_photo;

    /**
     * @ORM\OneToOne(targetEntity=Message::class, cascade={"persist", "remove"})
     */
    private $client_message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getClientPhoto(): ?Photo
    {
        return $this->client_photo;
    }

    public function setClientPhoto(?Photo $client_photo): self
    {
        $this->client_photo = $client_photo;

        return $this;
    }

    public function getClientMessage(): ?Message
    {
        return $this->client_message;
    }

    public function setClientMessage(?Message $client_message): self
    {
        $this->client_message = $client_message;

        return $this;
    }

    public function __toString()
    {
        return $this->getId().'?'.$this->getPrenom().'?'.$this->getNom().'?'.$this->getClientPhoto().'?'.$this->getClientMessage();
    }
}
