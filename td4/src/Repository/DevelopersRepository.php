<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repository;

use App\Entity\Developer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
/**
 * Description of DevelopersRepository
 *
 * @author Yves
 */
class DevelopersRepository extends ServiceEntityRepository implements IModelManager{
    
    public function __construct(RegistryInterface $registry){
        parent::__construct($registry, Developer::class);
    }

    /**
     * Deletes the entity at the specified index, that is to say the row in the database whose id matches parameter index
     * @param integer $index
     */
    public function delete($index) {
        $obj = $this->findBy(['id'=>$index]);
        $this->_em->remove($obj);
        $this->_em->flush();
    }

    /**
     * Get the entities whose attributes matches the values given
     * @param array $keysAndValues
     */
    public function filterBy($keysAndValues) {
        return $this->findBy($keysAndValues);
    }

    /**
     * Returns the entity at the specified index, that is to say the row in the database whose id matches parameter index
     * @param integer $index
     * @return App\Entity\Developer
     */
    public function get($index) {
        return $this->findBy(['id'=>$index]);
    }

    /**
     * Returns all those entities in the database
     * @return array of App\Entity\Developer
     */
    public function getAll() {
        return $this->findAll(); 
    }

    /**
     * Insert the object into the table developer in the database
     * @param App\Entity\Developer $object
     */
    public function insert($object) {
       $this->_em->persist($object);
       $this->_em->flush();
    }

    /**
     * Updates, if it exists in the database, the given entity. The keys of the array values must match the name of the model App\Entity\Developer attributes.
     * @param App\Entity\Developer $object
     * @param array $values
     */
    public function update($object, $values) {
        //Attaching, in case it wasn't already, the object with the database
        $objectToUpdate = $this->findBy(['id'=>$object->getId()]);
        foreach($values as $key=>$value){
            $set='set'.ucfirst($key);
            $objectToUpdate->$set($value);
        }
        $this->_em->persist($objectToUpdate);
        $this->_em->flush();
    }

    /**
     * Counts the number of row in the table developer
     * @return integer
     */
    public function compter(){
        $objs = $this->getAll();
        return sizeof($objs);
    }
}
