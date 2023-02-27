<?php

namespace App\Entity;

use App\Repository\PicturesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PicturesRepository::class)]
class Pictures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Pictures = null;

    #[ORM\Column(length: 255)]
    private ?string $Alt = null;

    #[ORM\ManyToOne(inversedBy: 'pictures')]
    private ?Product $product = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPictures(): ?string
    {
        return $this->Pictures;
    }

    public function setPictures(string $Pictures): self
    {
        $this->Pictures = $Pictures;

        return $this;
    }

    public function getAlt(): ?string
    {
        return $this->Alt;
    }

    public function setAlt(string $Alt): self
    {
        $this->Alt = $Alt;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }
}
