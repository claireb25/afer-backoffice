<?php

namespace App\Repository;

use App\Entity\StatutAnimateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StatutAnimateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatutAnimateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatutAnimateur[]    findAll()
 * @method StatutAnimateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatutAnimateurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StatutAnimateur::class);
    }

//    /**
//     * @return StatutAnimateur[] Returns an array of StatutAnimateur objects
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
    public function findOneBySomeField($value): ?StatutAnimateur
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
