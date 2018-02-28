<?php

namespace App\Repository;
 
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Entity\Tag;
 
class TagRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tag::class);
    }
    
    public function update(Tag $tag){
        $this->_em->persist($tag);
        $this->_em->flush();
    }

    public function compter() {
        
    }

    public function delete($index) {
        
    }

    public function filterBy($keysAndValues) {
        
    }

    public function get($index) {
        
    }

    public function getAll() {
        
    }

    public function insert($object) {
        
    }

}