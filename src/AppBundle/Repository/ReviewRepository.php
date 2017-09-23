<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Hotel;
use DateTime;
use Doctrine\ORM\EntityRepository;

/**
 * Class ReviewRepository
 */
class ReviewRepository extends EntityRepository
{
    /**
     * @param Hotel $hotel
     *
     * @return mixed
     */
    public function getLastYearAverageHotelRating(Hotel $hotel)
    {
        return $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('AVG(r.rating)')
            ->from('AppBundle:Review', 'r')
            ->where('r.hotel = :hotelId')
            ->andWhere('r.createDate >= :yearAgo')
            ->setParameter('hotelId', $hotel->getId())
            ->setParameter('yearAgo', (new DateTime())->modify('-1 year'))
            ->getQuery()
            ->getSingleScalarResult();
    }
}
