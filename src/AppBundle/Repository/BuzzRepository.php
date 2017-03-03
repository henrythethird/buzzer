<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class BuzzRepository extends EntityRepository
{
    public function findAllFrontQB()
    {
        return $this->createQueryBuilder('buzz')
            ->orderBy('buzz.issueDate');
    }
}