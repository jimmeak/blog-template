<?php

namespace Jimmeak\DoctrineBundle\Trait\Nullable;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait Html
{
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private string|null $html;

    public function getHtml(): string|null
    {
        return $this->html;
    }

    public function setHtml(string|null $html): static
    {
        $this->html = $html;
        return $this;
    }
}
