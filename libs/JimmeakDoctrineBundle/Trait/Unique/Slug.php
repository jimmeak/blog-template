<?php

namespace Jimmeak\DoctrineBundle\Trait\Unique;

use Doctrine\ORM\Mapping as ORM;

trait Slug
{
    #[ORM\Column(length: 190, unique: true)]
    private string $slug;

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;
        return $this;
    }
}
