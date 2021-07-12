<?php

namespace Apiato\Core\Abstracts\Actions;

abstract class Action
{
    protected string $ui;

    public function getUI()
    {
        return $this->ui;
    }

    public function setUI($interface)
    {
        $this->ui = $interface;

        return $this;
    }
}
