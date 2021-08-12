<?php

namespace Damian972\OptionsBundle\Contracts;

interface OptionRepositoryInterface
{
    /**
     * @return OptionInterface[]
     */
    public function findAll();

    public function findOneByKeyAndparent(string $identifier, ?string $parent = null): ?OptionInterface;

    public function save(OptionInterface $option): void;
}
