<?php

namespace App\Repository;

use App\Entity\VideoAlternatives;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VideoAlternatives|null find($id, $lockMode = null, $lockVersion = null)
 * @method VideoAlternatives|null findOneBy(array $criteria, array $orderBy = null)
 * @method VideoAlternatives[]    findAll()
 * @method VideoAlternatives[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoAlternativesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VideoAlternatives::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(VideoAlternatives $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(VideoAlternatives $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return VideoAlternatives[] Returns an array of VideoAlternatives objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VideoAlternatives
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
