<?php

namespace App\Repository;

use App\Entity\ModeEnvoiInscription;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ModeEnvoiInscription|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModeEnvoiInscription|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModeEnvoiInscription[]    findAll()
 * @method ModeEnvoiInscription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModeEnvoiInscriptionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ModeEnvoiInscription::class);
    }

//    /**
//     * @return ModeEnvoiInscription[] Returns an array of ModeEnvoiInscription objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ModeEnvoiInscription
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
