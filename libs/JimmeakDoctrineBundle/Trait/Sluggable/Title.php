<?php

namespace Jimmeak\DoctrineBundle\Trait\Sluggable;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation\Slug;

trait Title
{
    use \Jimmeak\DoctrineBundle\Trait\Title;

    #[ORM\Column(length: 190, unique: true)]
    #[Slug(fields: ['title'])]
    private string $slug;

    public function getSlug(): string
    {
        return $this->slug;
    }
}
