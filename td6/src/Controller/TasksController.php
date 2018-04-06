<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Services\semantic\TasksGui;
use App\Repository\TaskRepository;

class TasksController extends CrudController{
	
	public function __construct(TasksGui $gui,TaskRepository $repo){
		$this->gui=$gui;
		$this->repository=$repo;
		$this->type="tasks";
		$this->subHeader="Task list";
		$this->icon="tasks";
	}
    /**
     * @Route("/tasks", name="tasks")
     */
    public function index(){
    	return $this->_index();
    }
    
    /**
     * @Route("/tasks/refresh", name="tasks_refresh")
     */
    public function refresh(){
    	return $this->_refresh();
    }
    
    /**
     * @Route("/tasks/edit/{id}", name="tasks_edit")
     */
    public function edit($id){
    	return $this->_edit($id);
    }
    
    /**
     * @Route("/tasks/new", name="tasks_new")
     */
    public function add(){
    	return $this->_add("\App\Entity\Task");
    }

    /**
     * @Route("/tasks/update", name="tasks_update")
     */
    public function update(Request $request){
    	return $this->_update($request, "\App\Entity\Task");
    }
    
    /**
     * @Route("/tasks/confirmDelete/{id}", name="tasks_confirm_delete")
     */
    public function deleteConfirm($id){
    	return $this->_deleteConfirm($id);
    }
    
    /**
     * @Route("/tasks/delete/{id}", name="tasks_delete")
     */
    public function delete($id,Request $request){
    	return $this->_delete($id, $request);
    }
}
