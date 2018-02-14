<?php

namespace App\Model;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contact
 *
 * @author Yves
 */
class Contact {
    private $nom;
    private $prenom;
    private $email;
    private $tel;
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
