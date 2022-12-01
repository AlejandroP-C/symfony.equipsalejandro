<?php

namespace App\Repository;

use App\Entity\Equip;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Equip>
 *
 * @method Equip|null find($id, $lockMode = null, $lockVersion = null)
 * @method Equip|null findOneBy(array $criteria, array $orderBy = null)
 * @method Equip[]    findAll()
 * @method Equip[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Equip::class);
    }

    public function save(Equip $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Equip $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Equip[] Returns an array of Equip objects
     */
    public function orderByNota($nota)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.nota > :nota')
            ->setParameter('nota', $nota)
            ->orderBy('e.nota', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
