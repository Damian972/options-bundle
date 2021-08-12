<?php

namespace Damian972\OptionsBundle\Repository;

use Damian972\OptionsBundle\Contracts\OptionInterface;
use Damian972\OptionsBundle\Contracts\OptionRepositoryInterface;
use Damian972\OptionsBundle\Entity\Option;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class OptionRepository extends EntityRepository implements OptionRepositoryInterface
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, $em->getClassMetadata(Option::class));
    }

    public function findOneByKeyAndparent(string $key, ?string $parent = null): ?OptionInterface
    {
        if (null !== $parent) {
            return $this->findOneBy(compact('key', 'parent'));
        }

        return $this->findOneBy(compact('key'));
    }

    public function save(OptionInterface $option): void
    {
        $this->getEntityManager()->persist($option);
        $this->getEntityManager()->flush();
    }
}
