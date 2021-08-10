<?php

namespace Damian972\OptionsBundle\Contracts;

interface AbstractOptionsInterface
{
    public function get(string $key, ?string $parent = null): ?OptionInterface;

    public function set(OptionInterface $option): void;
}
