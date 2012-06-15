<?php
namespace Picweek\Bundle\MainBundle\Entity\Picnic;
use Doctrine\ORM\Query;

use Doctrine\ORM\Query\Expr;

use Doctrine\ORM\EntityRepository;

/**
 * Place Repository
 *
 * @author Philippe Gibert <philippe.gibert@gmail.com>
 * @since  0.1
 */
class PlaceRepository extends EntityRepository
{
    /**
     * Get numbers of place registered
     *
     * @return array
     */
    public function count()
    {
        $qB = $this->getEntityManager()->createQueryBuilder();
        $qB->select($qB->expr()->count('p.id'))
                        ->from('PicweekMainBundle:Picnic\Place', 'p');

        return $qB->getQuery()->getResult(Query::HYDRATE_SINGLE_SCALAR);
    }
}
