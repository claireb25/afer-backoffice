<?php

namespace App\Repository;

use App\Entity\Defraiement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Defraiement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Defraiement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Defraiement[]    findAll()
 * @method Defraiement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DefraiementRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Defraiement::class);
    }

//    /**
//     * @return Defraiement[] Returns an array of Defraiement objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Defraiement
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
