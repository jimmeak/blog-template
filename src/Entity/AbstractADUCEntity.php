<?php

namespace Blog\Entity;

use Jimmeak\DoctrineBundle\Trait\Active;
use Jimmeak\DoctrineBundle\Trait\CreatedAt;
use Jimmeak\DoctrineBundle\Trait\Deleted;
use Jimmeak\DoctrineBundle\Trait\UpdatedAt;

abstract class AbstractADUCEntity
{
    use Active;
    use Deleted;

    use UpdatedAt;
    use CreatedAt;
}
