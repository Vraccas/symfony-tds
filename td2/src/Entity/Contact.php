<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;
    
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom;
    
    /**
     * @ORM\Column(type="string", length=75)
     */
    private $email;
    
    /**
     * @ORM\Column(type="string", length=13)
     */
    private $tel;
    
    /**
     * @ORM\Column(type="string", length=13)
     */
    private $mobile;
}
