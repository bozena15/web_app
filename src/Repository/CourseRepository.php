<?php

namespace App\Repository;

use App\Entity\Course;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class CourseRepository extends ServiceEntityRepository

{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Course::class);
    }
    public function findAllPublic()
    {
        return $this->getEntityManager()
            ->createQuery(
                "SELECT r FROM App:Course r WHERE r.public='1'"
            )
            ->getResult();
    }
    public function findSearch($txt)
    {
        return $this->getEntityManager()
            ->createQuery(
                "SELECT r FROM App:Course r WHERE r.title LIKE '$txt'"
            )
            ->getResult();
    }

}