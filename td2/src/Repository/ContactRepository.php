<?php

namespace App\Repository;

use App\Entity\Contact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Service\IModelManager;

class ContactRepository extends ServiceEntityRepository implements IModelManager
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Contact::class);
    }

    public function delete($indexes) {
        
    }

    public function filterBy($keysAndValues) {
        
    }

    public function get($index) {
        
    }

    public function getAll() {
        
    }

    public function insert($objet) {
        
    }

    public function select($indexes) {
        
    }

    public function update($object, $values) {
        
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('c')
            ->where('c.something = :value')->setParameter('value', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
