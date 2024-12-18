<?php

namespace App\Repository;

use App\Entity\AjoutCategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AjoutCategorie>
 *
 * @method AjoutCategorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method AjoutCategorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method AjoutCategorie[]    findAll()
 * @method AjoutCategorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AjoutCategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AjoutCategorie::class);
    }

    //    /**
    //     * @return AjoutCategorie[] Returns an array of AjoutCategorie objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?AjoutCategorie
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
