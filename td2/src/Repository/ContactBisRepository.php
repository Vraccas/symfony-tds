<?php

namespace App\Repository;

use App\Entity\ContactBis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Service\IModelManager;
use Doctrine\DBAL\DriverManager;

class ContactBisRepository extends ServiceEntityRepository implements IModelManager
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ContactBis::class);
    }

    public function delete($indexes) {
        
        $keys=array_map(function ($index){return 'id='.$index;}, $indexes);
        $keys=implode("0", $indexes);
        $contacts=$this->findBy($indexes);
        foreach($contacts as $contact){
            $this->_em->remove($contact);
        }
    }

    public function filterBy($keysAndValues) {
        
    }

    public function get($index) {
        
    }

    public function getAll() {
        
    }

    public function insertion($objet) {
        $this->_em->persist($objet);
        $this->_em->flush();
    }

    public function select($indexes) {
        
    }

    public function update($object, $values) {
        $this->update($object, $values);
    }

    public function compter() {
        
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