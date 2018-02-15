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
     * @ORM\Column(type="string", length=75, nullable=true)
     */
    private $email;
    
    /**
     * @ORM\Column(type="string", length=13, nullable=true)
     */
    private $tel;
    
    /**
     * @ORM\Column(type="string", length=13, nullable=true)
     */
    private $mobile;
    
    
    public function __construct($nom, $prenom, $email=null, $tel=null, $mobile=null){
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->email=$email;
        $this->tel=$tel;
        $this->mobile=$mobile;
    }
    
    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTel() {
        return $this->tel;
    }

    public function getMobile() {
        return $this->mobile;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTel($tel) {
        $this->tel = $tel;
    }

    public function setMobile($mobile) {
        $this->mobile = $mobile;
    }
    
    public function getId(){
        return $this->id;
    }

    public function equals($contact){
        if($contact==$this){
            return true;
        }
        if($contact->getNom()==$this->getNom() && $contact->getPrenom()==$this->getPrenom()
                && $contact->getEmail()==$this->getEmail() && $contact->getTel()==$this->getTel()
                && $contact->getMobile()==$this->getMobile()){
            return true;
        }else{
            return false;
        }
    }

}