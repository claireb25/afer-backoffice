<?php

namespace App\Repository;

use App\Entity\NaturePrefecture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NaturePrefecture|null find($id, $lockMode = null, $lockVersion = null)
 * @method NaturePrefecture|null findOneBy(array $criteria, array $orderBy = null)
 * @method NaturePrefecture[]    findAll()
 * @method NaturePrefecture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NaturePrefectureRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NaturePrefecture::class);
    }

//    /**
//     * @return NaturePrefecture[] Returns an array of NaturePrefecture objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NaturePrefecture
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
