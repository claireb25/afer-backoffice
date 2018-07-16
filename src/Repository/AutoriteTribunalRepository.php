<?php

namespace App\Repository;

use App\Entity\AutoriteTribunal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AutoriteTribunal|null find($id, $lockMode = null, $lockVersion = null)
 * @method AutoriteTribunal|null findOneBy(array $criteria, array $orderBy = null)
 * @method AutoriteTribunal[]    findAll()
 * @method AutoriteTribunal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AutoriteTribunalRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AutoriteTribunal::class);
    }

//    /**
//     * @return AutoriteTribunal[] Returns an array of AutoriteTribunal objects
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
    public function findOneBySomeField($value): ?AutoriteTribunal
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
