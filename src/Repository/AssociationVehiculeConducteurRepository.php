<?php

namespace App\Repository;

use App\Entity\AssociationVehiculeConducteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AssociationVehiculeConducteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method AssociationVehiculeConducteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method AssociationVehiculeConducteur[]    findAll()
 * @method AssociationVehiculeConducteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AssociationVehiculeConducteurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AssociationVehiculeConducteur::class);
    }

    // /**
    //  * @return AssociationVehiculeConducteur[] Returns an array of AssociationVehiculeConducteur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AssociationVehiculeConducteur
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
