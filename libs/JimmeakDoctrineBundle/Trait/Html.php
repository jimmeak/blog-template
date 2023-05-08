<?php

namespace Jimmeak\DoctrineBundle\Trait;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait Html
{
    #[ORM\Column(type: Types::TEXT)]
    private string $html;

    public function getHtml(): string
    {
        return $this->html;
    }

    public function setHtml(string $html): static
    {
        $this->html = $html;
        return $this;
    }
}
