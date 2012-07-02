<?php
namespace Picweek\Bundle\MainBundle\Entity\Picnic;
use Doctrine\ORM\Query;
use Doctrine\ORM\Query\Expr;
use Doctrine\ORM\EntityRepository;
use \PDO;

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

    /**
     * Find places near position
     * @param float   $latitude  Latitude start point
     * @param float   $longitude Longitude start point
     * @param integer $radius    Radius around start point
     *
     * @return array
     */
    public function searchNear($latitude, $longitude, $radius = 100)
    {
        $sql="SELECT id ,
                (6371 * 2 * ATAN2 ( SQRT ( ( SIN( ( RADIANS(p.latitude - $latitude) / 2 )
                * SIN( RADIANS(p.latitude - $latitude) / 2 ) + COS ( RADIANS ($latitude ))
                * COS ( RADIANS ( p.latitude ) ) * SIN ( RADIANS(p.longitude - $longitude) / 2 )
                * SIN ( RADIANS(p.longitude - $longitude) / 2 ) ) )) ,
                SQRT ( 1 - (SIN( RADIANS(p.latitude - $latitude) / 2 )
                * SIN( RADIANS(p.latitude - $latitude) / 2 ) + COS ( RADIANS ($latitude) )
                * COS ( RADIANS (p.latitude) )
                * SIN ( RADIANS(p.longitude - $longitude) / 2 )
                * SIN ( RADIANS(p.longitude - $longitude) / 2 ) ) ) )) AS distance
            FROM Place AS p
            HAVING  distance < $radius;";
        $datas = $this->getEntityManager()->getConnection()->executeQuery($sql)
                                                               ->fetchAll(3);
        $dists = array();
        foreach ($datas as $row) {
            $dists[$row[0]] = (float) $row[1];
        }

        $places = array();
        if (count($dists)) {
            $ids = array_keys($dists);

            $qB = $this->getEntityManager()->createQueryBuilder();
            $qB->select("p")
                ->from('PicweekMainBundle:Picnic\Place', 'p')
                ->where('p.id IN ('.implode(',', $ids).')');

            $places = $qB->getQuery()->getResult(Query::HYDRATE_ARRAY);
        }

        return array(
            'dists' => $dists,
            'places' => $places
        );
    }
}
