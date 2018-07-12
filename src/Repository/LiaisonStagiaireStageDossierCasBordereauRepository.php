<?php

namespace App\Repository;

use App\Entity\LiaisonStagiaireStageDossierCasBordereau;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LiaisonStagiaireStageDossierCasBordereau|null find($id, $lockMode = null, $lockVersion = null)
 * @method LiaisonStagiaireStageDossierCasBordereau|null findOneBy(array $criteria, array $orderBy = null)
 * @method LiaisonStagiaireStageDossierCasBordereau[]    findAll()
 * @method LiaisonStagiaireStageDossierCasBordereau[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LiaisonStagiaireStageDossierCasBordereauRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LiaisonStagiaireStageDossierCasBordereau::class);
    }

//    /**
//     * @return LiaisonStagiaireStageDossierCasBordereau[] Returns an array of LiaisonStagiaireStageDossierCasBordereau objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LiaisonStagiaireStageDossierCasBordereau
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
