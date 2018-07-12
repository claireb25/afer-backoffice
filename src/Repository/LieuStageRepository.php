<?php

namespace App\Repository;

use App\Entity\LieuStage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LieuStage|null find($id, $lockMode = null, $lockVersion = null)
 * @method LieuStage|null findOneBy(array $criteria, array $orderBy = null)
 * @method LieuStage[]    findAll()
 * @method LieuStage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LieuStageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LieuStage::class);
    }

//    /**
//     * @return LieuStage[] Returns an array of LieuStage objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LieuStage
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
