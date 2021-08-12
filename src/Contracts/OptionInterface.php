<?php

namespace Damian972\OptionsBundle\Contracts;

interface OptionInterface
{
    public function getName(): string;

    public function getKey(): string;

    public function getValue(): string;

    public function getParent(): ?string;

    public static function make(string $key, string $value, ?string $parent = null): OptionInterface;
}
