<?php

namespace App\Controller;
 
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\DevelopersRepository;

use App\Entity\Developer;

/**
 * Description of DevelopersController
 *
 * @author Yves
 */
class DevelopersController extends Controller{

    
    /**
     * @Route("/developers", name="developers")
     */
    public function index(DevelopersRepository $repo){
        $devs = $repo->getAll();
        return $this->render('Developers/index.html.twig', ['devs'=>$devs]);
    }
    
    /**
     * @Route("developer/update/{id}", name="developer_update")
     */
    public function update(){
        
    }
    
    /**
     * @Route("/developers", name="developers")
     */
    public function all(DevelopersRepository $repo){
        $devs = $repo->getAll();
        return $this->render('Developers/all.html.twig', ['devs'=>$devs]);
    }
    
    public function actionNew(DevelopersRepository $repo){
        
    }
}
