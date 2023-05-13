<?php

namespace Jimmeak\DoctrineBundle\EventListener;

use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Mapping\ClassMetadataInfo;
use Symfony\Component\String\UnicodeString;
use function Symfony\Component\String\u;

readonly class TableNameListener
{
    public function __construct(
        protected string $entityNamespace,
    ) {}

    public function loadClassMetadata(LoadClassMetadataEventArgs $eventArgs)
    {
        $metadata = $eventArgs->getClassMetadata();
        $prefix = $eventArgs->getEntityManager()->getConfiguration()->getEntityNamespace($this->entityNamespace);

        $metadata->setPrimaryTable(['name' => $this->findName($metadata->getName(), $prefix)]);

        if ($metadata->rootEntityName === $metadata->getName() || !$metadata->isInheritanceTypeSingleTable()) {
            $metadata->setPrimaryTable(['name' => $this->findName($metadata->getName(), $prefix)]);
        }

        foreach ($metadata->getAssociationMappings() as $fieldName => $mapping) {
            if($mapping['type'] === ClassMetadataInfo::MANY_TO_MANY && $mapping['isOwningSide']) {
                $metadata->associationMappings[$fieldName]['joinTable']['name'] = $this->findManyToManyName(
                    $mapping['sourceEntity'],
                    $mapping['targetEntity'],
                    $prefix
                );
            }
        }
    }

    private function findName(string $namespace, string $prefix): string
    {
        $namespaceArray = u($namespace)->replace($prefix, '')->trimPrefix('\\')->split('\\');
        $namespaceArray = array_map(fn (UnicodeString $string) => $string->snake(), $namespaceArray);
        return u()->join($namespaceArray, '__');
    }

    private function findManyToManyName(string $sourceEntityNamespace, string $targetEntityNamespace, string $prefix): string
    {
        $sourceName = $this->findName($sourceEntityNamespace, $prefix);
        $targetName = $this->findName($targetEntityNamespace, $prefix);
        return sprintf('%s____%s', $sourceName, $targetName);
    }
}
