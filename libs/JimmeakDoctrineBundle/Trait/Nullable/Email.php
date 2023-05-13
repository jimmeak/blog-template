<?php

namespace Jimmeak\DoctrineBundle\Trait\Nullable;

use Doctrine\ORM\Mapping as ORM;

trait Email
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
