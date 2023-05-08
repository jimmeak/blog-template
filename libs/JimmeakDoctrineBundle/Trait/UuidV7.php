<?php

namespace Jimmeak\DoctrineBundle\Trait;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

trait UuidV7
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private \Symfony\Component\Uid\UuidV7 $id;

    public function getId(): \Symfony\Component\Uid\UuidV7
    {
        return $this->id;
    }

    public function refreshId(): static
    {
        $this->id = Uuid::v7();
        return $this;
    }
}
