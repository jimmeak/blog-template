<?php

namespace Jimmeak\DoctrineBundle\Trait;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation\Slug;

trait SlugTitle
{
    use Title;

    #[ORM\Column(length: 190, unique: true)]
    #[Slug(fields: ['title'])]
    private string $slug;

    public function getSlug(): string
    {
        return $this->slug;
    }
}
