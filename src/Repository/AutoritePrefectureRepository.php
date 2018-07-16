<?php

namespace App\Repository;

use App\Entity\AutoritePrefecture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AutoritePrefecture|null find($id, $lockMode = null, $lockVersion = null)
 * @method AutoritePrefecture|null findOneBy(array $criteria, array $orderBy = null)
 * @method AutoritePrefecture[]    findAll()
 * @method AutoritePrefecture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AutoritePrefectureRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AutoritePrefecture::class);
    }

//    /**
//     * @return AutoritePrefecture[] Returns an array of AutoritePrefecture objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AutoritePrefecture
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
