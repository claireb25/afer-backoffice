<?php

namespace App\Repository;

use App\Entity\ServicePrefecture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ServicePrefecture|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServicePrefecture|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServicePrefecture[]    findAll()
 * @method ServicePrefecture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServicePrefectureRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ServicePrefecture::class);
    }

//    /**
//     * @return ServicePrefecture[] Returns an array of ServicePrefecture objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ServicePrefecture
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
