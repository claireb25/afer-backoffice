<?php

namespace App\Repository;

use App\Entity\ForfaitAnimateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ForfaitAnimateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method ForfaitAnimateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method ForfaitAnimateur[]    findAll()
 * @method ForfaitAnimateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ForfaitAnimateurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ForfaitAnimateur::class);
    }

//    /**
//     * @return ForfaitAnimateur[] Returns an array of ForfaitAnimateur objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ForfaitAnimateur
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
