<?php

namespace App\Repository;

use App\Entity\CasStage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CasStage|null find($id, $lockMode = null, $lockVersion = null)
 * @method CasStage|null findOneBy(array $criteria, array $orderBy = null)
 * @method CasStage[]    findAll()
 * @method CasStage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CasStageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CasStage::class);
    }

//    /**
//     * @return CasStage[] Returns an array of CasStage objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CasStage
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
