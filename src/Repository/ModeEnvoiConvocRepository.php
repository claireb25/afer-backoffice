<?php

namespace App\Repository;

use App\Entity\ModeEnvoiConvoc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ModeEnvoiConvoc|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModeEnvoiConvoc|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModeEnvoiConvoc[]    findAll()
 * @method ModeEnvoiConvoc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModeEnvoiConvocRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ModeEnvoiConvoc::class);
    }

//    /**
//     * @return ModeEnvoiConvoc[] Returns an array of ModeEnvoiConvoc objects
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
    public function findOneBySomeField($value): ?ModeEnvoiConvoc
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
