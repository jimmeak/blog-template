<?php

namespace Jimmeak\DoctrineBundle\Trait;

use Doctrine\ORM\Mapping as ORM;

trait Deleted
{
    #[ORM\Column(options: ['default' => false])]
    private bool $deleted = false;

    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted = true): static
    {
        $this->deleted = $deleted;
        return $this;
    }
}
