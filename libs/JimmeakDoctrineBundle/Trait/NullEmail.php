<?php

namespace Jimmeak\DoctrineBundle\Trait;

use Doctrine\ORM\Mapping as ORM;

trait NullEmail
{
    #[ORM\Column(length: 255, nullable: true)]
    private string|null $email;

    public function getEmail(): string|null
    {
        return $this->email;
    }

    public function setEmail(string|null $email): static
    {
        $this->email = $email;
        return $this;
    }
}
