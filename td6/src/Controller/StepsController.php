<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Repository\StepRepository;
use App\Services\semantic\StepsGui;
use App\Entity\Step;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class StepsController extends Controller{

    public function __construct(StepsGui $gui, StepRepository $repo) {
        $this->gui=$gui;
        $this->repository=$repo;
        $this->type="steps";
        $this->subHeader="Step list";
        $this->icon="step-forward";
    }
    
    /**
     * @Route("/steps", name="steps")
     */
    public function index(){
    	return $this->_index();
    }
    
    /**
     * @Route("/steps/refresh", name="steps_refresh")
     */
    public function refresh(){
    	return $this->_refresh();
    }
    
    /**
     * @Route("/steps/edit/{id}", name="steps_edit")
     */
    public function edit($id){
    	return $this->_edit($id);
    }
    
    /**
     * @Route("/steps/new", name="steps_new")
     */
    public function add(){
    	return $this->_add("\App\Entity\Developer");
    }

    /**
     * @Route("step/update/{id}", name="step_update")
     */
    public function update(Step $step, StepsGui $stepsGui){
    	$stepsGui->frm($step);
    	return $stepsGui->renderView('Steps/frm.html.twig');
    }

    /**
     * @Route("step/submit", name="step_submit")
     */
    public function submit(Request $request,StepRepository $repo){
    	$step=$repo->find($request->get("id"));
    	if(isset($step)){
    		$step->setTitle($request->get("title"));
    		$step->setColor($request->get("color"));
    		$repo->update($step);
    	}
    	return $this->redirectToRoute("steps");
    }
    
    /**
     * @Route("/steps/confirmDelete/{id}", name="steps_confirm_delete")
     */
    public function deleteConfirm($id){
    	return $this->_deleteConfirm($id);
    }
    
    /**
     * @Route("/steps/delete/{id}", name="steps_delete")
     */
    public function delete($id,Request $request){
    	return $this->_delete($id, $request);
    }

}
