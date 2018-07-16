<?php

namespace App\Repository;

use App\Entity\NatureTribunal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NatureTribunal|null find($id, $lockMode = null, $lockVersion = null)
 * @method NatureTribunal|null findOneBy(array $criteria, array $orderBy = null)
 * @method NatureTribunal[]    findAll()
 * @method NatureTribunal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NatureTribunalRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NatureTribunal::class);
    }

//    /**
//     * @return NatureTribunal[] Returns an array of NatureTribunal objects
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
    public function findOneBySomeField($value): ?NatureTribunal
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
