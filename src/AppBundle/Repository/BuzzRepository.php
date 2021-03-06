<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Buzz;
use AppBundle\Entity\Firefighter;
use Doctrine\ORM\EntityRepository;

class BuzzRepository extends EntityRepository
{
    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function findAllFrontQB()
    {
        return $this->createQueryBuilder('buzz')
            ->orderBy('buzz.issueDate', 'DESC');
    }

    /**
     * @param Firefighter $firefighter
     * @return integer
     */
    public function findCountByFirefighter(Firefighter $firefighter = null, $statusBlacklist = [])
    {
        if (!$firefighter) {
            return 0;
        }

        $queryBuilder = $this->createQueryBuilder('buzz')
            ->select("count(buzz.id)")
            ->where("buzz.issueDate >= :FROM_DATE")
            ->andWhere('buzz.issueDate <= :TO_DATE')
            ->setParameters([
                'FROM_DATE' => $firefighter->getActiveFrom(),
                'TO_DATE' => $firefighter->getActiveTo()
            ]);

        if ($statusBlacklist) {
            $queryBuilder->andWhere('buzz.status.code NOT IN (:STATUS)')
                ->setParameter('STATUS', $statusBlacklist);
        }

        return $queryBuilder->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * @return array
     */
    public function findByDay()
    {
        return array_reduce($this->findAll(), function($acc, Buzz $buzz) {
            $acc[$buzz->getIssueDate()->format('d')] += 1;
        }, []);
    }
}