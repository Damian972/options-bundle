<?php

namespace Damian972\OptionsBundle\Adapter;

use Damian972\OptionsBundle\Contracts\AdapterInterface;
use Damian972\OptionsBundle\Contracts\OptionInterface;
use Damian972\OptionsBundle\Contracts\OptionRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineAdapter implements AdapterInterface
{
    protected OptionRepositoryInterface $repository;

    public function __construct(EntityManagerInterface $em)
    {
        $this->repository = $em->getRepository(OptionInterface::class);
    }

    public function getIdentifier(): string
    {
        return 'doctrine';
    }

    public function getAll(): array
    {
        return $this->repository->findAll();
    }

    public function get(string $key, ?string $parent = null): ?OptionInterface
    {
        return $this->repository->findByIdentifierAndParent($key, $parent);
    }

    public function set(OptionInterface $option): void
    {
        $this->repository->save($option);
    }
}
