<?php

namespace Jimmeak\DoctrineBundle\Trait\Unique;

use Doctrine\ORM\Mapping as ORM;

trait Email
{
    #[ORM\Column(length: 190, unique: true)]
    private string $email;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;
        return $this;
    }
}
