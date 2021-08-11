<?php

namespace Apiato\Core\Traits;

trait WithUITrait
{
    protected string $ui;

    public function getUI(): string
    {
        return $this->ui;
    }

    public function setUI($interface): self
    {
        $this->ui = $interface;

        return $this;
    }
}
