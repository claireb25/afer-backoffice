<?php

namespace App\Repository;

use App\Entity\TypeInfraction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeInfraction|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeInfraction|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeInfraction[]    findAll()
 * @method TypeInfraction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeInfractionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeInfraction::class);
    }

//    /**
//     * @return TypeInfraction[] Returns an array of TypeInfraction objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeInfraction
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
