<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Firefighter;
use Doctrine\ORM\EntityRepository;

class FirefighterRepository extends EntityRepository
{
    /**
     * @return Firefighter|null
     */
    public function findActive()
    {
        return $this->createQueryBuilder('firefighter')
            ->where('firefighter.activeTo IS NULL')
            ->orWhere('firefighter.activeTo >= :CURRENT_DATE')
            ->setParameter('CURRENT_DATE', new \DateTime('today'))
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}