<?php

namespace App\Repository;

use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Entity\Story;

class StoryRepository extends MainRepository{
    public function __construct(RegistryInterface $registry){
        parent::__construct($registry, Story::class);
    }
}
