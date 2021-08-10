<?php

namespace Damian972\OptionsBundle\Contracts;

interface OptionsInterface extends AbstractOptionsInterface
{
    public function has(string $key, ?string $parent = null): bool;

    public function setAdapter(AdapterInterface $adapter): void;
}
