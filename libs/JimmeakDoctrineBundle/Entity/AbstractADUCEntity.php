<?php

namespace Jimmeak\DoctrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Jimmeak\DoctrineBundle\Trait\Active;
use Jimmeak\DoctrineBundle\Trait\CreatedAt;
use Jimmeak\DoctrineBundle\Trait\Deleted;
use Jimmeak\DoctrineBundle\Trait\UpdatedAt;

#[ORM\MappedSuperclass]
#[ORM\Index(columns: ['active'])]
#[ORM\Index(columns: ['deleted'])]
#[ORM\Index(columns: ['updated_at'])]
#[ORM\Index(columns: ['created_at'])]
abstract class AbstractADUCEntity
{
    use Active;
    use Deleted;
    use UpdatedAt;
    use CreatedAt;
}
