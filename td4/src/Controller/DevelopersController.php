<?php

namespace App\Controller;
 
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\DevelopersRepository;
use App\Services\semantic\DevelopersGui;
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
    public function index(DevelopersGui $gui, DevelopersRepository $repo){
        /*$devs = $repo->getAll();
        return $this->render('Developers/index.html.twig', ['devs'=>$devs]);*/
        $devs=$repo->findAll();
        $dt=$gui->dataTable($devs);
        return $gui->renderView("Developers/index.html.twig");
    }
    
    /**
     * @Route("developer/update/{id}", name="developer_update")
     */
    public function update(Developer $dev, DevelopersGui $gui){
        $gui->frm($dev);
        return $gui->renderView('Developers/frm.html.twig');
    }
    
    /**
     * @Route("developer/delete/{id}", name="developer_delete")
     */
    public function delete(Developer $dev, DevelopersRepository $repo){
        $repo->delete($dev->getId());
        $this->redirectToRoute("/developers");
    }
    
    /**
     * @Route("/developers_all", name="developers_all")
     */
    public function all(DevelopersRepository $repo){
        $devs = $repo->getAll();
        return $this->render('Developers/all.html.twig', ['devs'=>$devs]);
    }
    
    public function actionNew(DevelopersRepository $repo){
        
    }
    
    /**
     * @Route("developer/submit", name="developer_submit")
     */
    public function submit(Request $request, DevelopersRepository $repo){
        $dev=$repo->find($request->get("id"));
        if(isset($dev)){
            $dev->setIdentity($request->get("identity"));
            //$dev->setColor($request->get("color"));
            $repo->update($dev);
        }
        //Attention : le forward attend un nom de méthode et non pas une route !
        //Warning : method forward expects a method's name and not a route !
        return $this->forward("App\Controller\DevelopersController::index");
    }
}
