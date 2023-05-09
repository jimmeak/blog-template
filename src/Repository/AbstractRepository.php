<?php

namespace Blog\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

abstract class AbstractRepository extends ServiceEntityRepository
{

    public function findActiveBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null): array
    {
        if (isset($criteria['active'])) {
            unset($criteria['active']);
        }

        if (isset($criteria['deleted'])) {
            unset($criteria['deleted']);
        }

        $columns = $this->getClassMetadata()->getColumnNames();

        if (in_array('active', $columns)) {
            $criteria = array_merge($criteria, ['active' => true]);
        }

        if (in_array('deleted', $columns)) {
            $criteria = array_merge($criteria, ['deleted' => false]);
        }

        return $this->findBy($criteria, $orderBy, $limit, $offset);
    }
}
