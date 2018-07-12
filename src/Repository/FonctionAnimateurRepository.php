<?php

namespace App\Repository;

use App\Entity\FonctionAnimateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FonctionAnimateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method FonctionAnimateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method FonctionAnimateur[]    findAll()
 * @method FonctionAnimateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FonctionAnimateurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FonctionAnimateur::class);
    }

//    /**
//     * @return FonctionAnimateur[] Returns an array of FonctionAnimateur objects
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
    public function findOneBySomeField($value): ?FonctionAnimateur
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
