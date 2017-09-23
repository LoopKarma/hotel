<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Hotel;
use Doctrine\ORM\EntityRepository;

/**
 * Class HotelRepository
 */
class HotelRepository extends EntityRepository
{
    /**
     * @param int $uuid
     *
     * @return Hotel|null
     */
    public function findByUuid(int $uuid)
    {
        return $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('h')
            ->from('AppBundle:Hotel', 'h')
            ->where('h.uuid = :uuid')
            ->setParameter('uuid', $uuid)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
