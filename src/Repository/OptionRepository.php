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

    public function findByIdentifierAndParent(string $identifier, ?string $parent = null): ?OptionInterface
    {
        $query = $this->createQueryBuilder('o')
            ->where('o.identifier = :identifier')
            ->setParameter('identifier', $identifier)
        ;

        if (null !== $parent) {
            $query->andWhere('o.parent = :parent')
                ->setParameter('parent', $parent)
            ;
        }

        return $query->getQuery()->getOneOrNullResult();
    }

    public function save(OptionInterface $option): void
    {
        $this->getEntityManager()->persist($option);
        $this->getEntityManager()->flush();
    }
}
