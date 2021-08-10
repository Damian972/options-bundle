<?php

namespace Damian972\OptionsBundle\Contracts;

interface AdapterInterface extends AbstractOptionsInterface
{
    public function getIdentifier(): string;

    /**
     * @return OptionInterface[]
     */
    public function getAll(): array;
}
