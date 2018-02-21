<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Services\semantic\ProjectsGui;
use App\Repository\ProjectRepository;

class ProjectsController extends Controller{
    
    
    /**
     * @Route("/index", name="index")
     */
    public function index(ProjectsGui $gui){
        $gui->button();
        return $gui->renderView('Projects/index.html.twig');
        //renderView est la fonction qui gère automatiquement les composants visuels et JQuery
    }
    
    
    /**
     * @Route("/test", name="test")
     */
    public function actionTest(\App\Repository\ProjectRepository $repo)
    {   
        return $this->render('contacts/base.html.twig', ["contactRepo" => $repo]);  
    }
    
    /**
     * @Route("/projects", name="projects")
     */
    public function all(ProjectRepository $projectRepo){
        $projects=$projectRepo->findAll();
        return $this->render('Projects/all.html.twig',["projects"=>$projects]);
    }
}

