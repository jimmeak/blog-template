<?php

namespace Jimmeak\DoctrineBundle\Trait;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait Annotation {

    #[ORM\Column(type: Types::TEXT)]
    private string $annotation;

    public function getAnnotation(): string
    {
        return $this->annotation;
    }

    public function setAnnotation(string $annotation): static
    {
        $this->annotation = $annotation;
        return $this;
    }
}
