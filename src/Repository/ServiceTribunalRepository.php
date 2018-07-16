<?php

namespace App\Repository;

use App\Entity\ServiceTribunal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ServiceTribunal|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceTribunal|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceTribunal[]    findAll()
 * @method ServiceTribunal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceTribunalRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ServiceTribunal::class);
    }

//    /**
//     * @return ServiceTribunal[] Returns an array of ServiceTribunal objects
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
    public function findOneBySomeField($value): ?ServiceTribunal
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
