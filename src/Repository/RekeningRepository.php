<?php

namespace App\Repository;

use App\Entity\Rekening;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Rekening|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rekening|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rekening[]    findAll()
 * @method Rekening[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RekeningRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Rekening::class);
    }

    // /**
    //  * @return Rekening[] Returns an array of Rekening objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Rekening
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
