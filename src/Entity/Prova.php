<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProvaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ProvaRepository::class)
 */
class Prova
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
    private $descrizione;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescrizione(): ?string
    {
        return $this->descrizione;
    }

    public function setDescrizione(string $descrizione): self
    {
        $this->descrizione = $descrizione;

        return $this;
    }
}
