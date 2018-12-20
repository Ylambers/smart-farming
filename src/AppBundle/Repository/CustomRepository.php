<?php
/**
 * Created by PhpStorm.
 * User: Yaron Lambers
 * Date: 18-Dec-18
 * Time: 14:11
 */

namespace AppBundle\Repository;


/**
 * Class CustomRepository
 * @package AppBundle\Repository
 */
class CustomRepository extends \Doctrine\ORM\EntityRepository
{

    /**
     * @return array
     * Find all main categories
     */
    public function findMainCategory()
    {
        return $this->getEntityManager()
            ->createQuery(
                '
                        SELECT cat FROM AppBundle:Category cat
                        WHERE cat.subcategory IS NOT NULL
                        ORDER BY cat.id ASC
                     '
            )
            ->getResult();
    }


    /**
     * @param $id
     * @return array
     * Find all subcategories with the given id
     */
    public function findSubCategory($id)
    {

        return $this->getEntityManager()
        ->createQuery(
            '
                        SELECT cat FROM AppBundle:Category cat
                        WHERE cat.subcategory = :id
                        ORDER BY cat.id ASC
                 '
        )
        ->setParameter('id', $id)
        ->getResult();

    }
}
