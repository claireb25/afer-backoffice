<?php

namespace App\Repository;

use App\Entity\SuiviDossier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SuiviDossier|null find($id, $lockMode = null, $lockVersion = null)
 * @method SuiviDossier|null findOneBy(array $criteria, array $orderBy = null)
 * @method SuiviDossier[]    findAll()
 * @method SuiviDossier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SuiviDossierRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SuiviDossier::class);
    }

//    /**
//     * @return SuiviDossier[] Returns an array of SuiviDossier objects
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
    public function findOneBySomeField($value): ?SuiviDossier
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
