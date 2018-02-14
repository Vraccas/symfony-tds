<?php

namespace App\Service;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Description of ContactSessionManager
 *
 * @author Yves
 */

/**
 * @var SessionInterface $session
 */
class ContactSessionManager implements IModelManager{ //On utilise la session pour stocker les contacts et leurs index
    
    
    
    public function __construct(SessionInterface $session){
        $this->session=$session;
    }
    
    public function updateSession($values){
        $this->session->set("contacts", $values);
    }
    
    public function count() {
        return $this->session->get("contacts")->size();
    }

    public function delete($indexes) {
        $contacts = $this->session->get("contacts");
        foreach($indexes as $index){
            $contacts[$index] = null;
        }
        $i=0;$nouveauxContacts=null;
        foreach($contacts as $key=>$contact){
            if($contact!=null){
                $nouveauxContacts[$i]=$contact;    
            }
        }
        $this->updateSession($nouveauxContacts);
    }

    public function filterBy($keysAndValues) {
        
    }

    public function get($index) {
        return $this->session->get("contacts")[$index];
    }

    public function getAll() {
        return $this->session->get("contacts");
    }

    public function insert($objet) {
        $contacts = $this->getAll();
        $contacts[] = $objet;
        $this->updateSession($contacts);
    }

    public function select($indexes) {
        $this->session->set("indexContacts", $indexes);
    }

    public function update($object, $values) {
        $contacts = $this->session->get("contacts");
        foreach($contacts as $cle=>$contact){
            if($contact->equals($object)){
                foreach($values as $keyV => $valeur){
                    $method = 'set'.ucfirst($keyV);
                    $contact->$method($valeur);
                    
                }
            }
        }
    }

}
