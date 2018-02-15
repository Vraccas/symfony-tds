<?php

namespace App\Repository;

use App\Entity\Contact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Service\IModelManager;
use Doctrine\DBAL\DriverManager;

class ContactRepository extends ServiceEntityRepository implements IModelManager
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Contact::class);
    }

    public function delete($indexes) {
        foreach($indexes as $key=>$index){
            $obj = $this->find($index);
            $this->_em->remove($obj);
        }
        $this->_em->flush();
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
        $objectUpdate = $this->find($object->getId());
        foreach($values as $key=>$value){
            $setter='set'.ucfirst($key);
            $objectUpdate->$setter($value);
        }
        $this->_em->persist($objectUpdate);
        $this->_em->flush();
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