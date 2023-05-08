<?php

namespace Blog\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class AbstractRepository extends ServiceEntityRepository
{
    public function findActive(array $criteria, ?array $orderBy = null, $limit = null, $offset = null, bool $active = true): array
    {
        if (isset($criteria['active'])) {
            unset($criteria['active']);
        }

        $criteria = array_merge($criteria, ['active' => $active]);

        return $this->findBy($criteria, $orderBy, $limit, $offset);
    }

    public function findDeleted(array $criteria, ?array $orderBy = null, $limit = null, $offset = null): array
    {
        if (isset($criteria['deleted'])) {
            unset($criteria['deleted']);
        }

        $criteria = array_merge($criteria, ['deleted' => true]);

        return $this->findBy($criteria, $orderBy, $limit, $offset);
    }

    public function findUndeleted(array $criteria, ?array $orderBy = null, $limit = null, $offset = null): array
    {
        if (isset($criteria['deleted'])) {
            unset($criteria['deleted']);
        }

        $criteria = array_merge($criteria, ['deleted' => false]);

        return $this->findBy($criteria, $orderBy, $limit, $offset);
    }
}
