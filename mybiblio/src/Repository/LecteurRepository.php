<?php

namespace App\Repository;

use App\Entity\Lecteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Lecteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lecteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lecteur[]    findAll()
 * @method Lecteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LecteurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lecteur::class);
    }

    // /**
    //  * @return Lecteur[] Returns an array of Lecteur objects
    //  */
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
    public function findOneBySomeField($value): ?Lecteur
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
