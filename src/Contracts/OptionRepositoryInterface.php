<?php

namespace Damian972\OptionsBundle\Contracts;

interface OptionRepositoryInterface
{
    /**
     * @return OptionInterface[]
     */
    public function findAll(): array;

    public function findByIdentifierAndParent(string $identifier, ?string $parent = null): ?OptionInterface;

    public function save(OptionInterface $option): void;
}
