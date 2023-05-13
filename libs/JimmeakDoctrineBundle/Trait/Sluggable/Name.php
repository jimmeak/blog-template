<?php

namespace Jimmeak\DoctrineBundle\Trait\Sluggable;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation\Slug;

trait Name
{
    use \Jimmeak\DoctrineBundle\Trait\Name;

    #[ORM\Column(length: 190, unique: true)]
    #[Slug(fields: ['name'])]
    private string $slug;

    public function getSlug(): string
    {
        return $this->slug;
    }
}
