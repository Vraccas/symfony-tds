<?php 
namespace App\Services\semantic;

use Ajax\semantic\html\elements\HtmlLabel;
use App\Entity\Task;
use Ajax\semantic\html\base\constants\Color;

class TasksGui extends SemanticGui{
	
	public function dataTable($tasks,$type){
		$dt=$this->_semantic->dataTable("dt-".$type, "App\Entity\Task", $tasks);
		$dt->setIdentifierFunction("getId");
		$dt->setFields(["task"]);
                $dt->setCaptions(["Task"]);
                $dt->setValueFunction("task", function($v,$task){
			$lbl=new HtmlLabel("",$task->getContent());
			return $lbl;
		});
		$dt->addEditDeleteButtons(false, [ "ajaxTransition" => "random","hasLoader"=>false ], function ($bt) {
			$bt->addClass("circular");
		}, function ($bt) {
			$bt->addClass("circular");
		});
		$dt->onPreCompile(function () use (&$dt) {
			$dt->getHtmlComponent()->colRight(1);
		});
		$dt->setUrls(["edit"=>"tasks/edit","delete"=>"tasks/confirmDelete"]);
		$dt->setTargetSelector("#frm");
		return $dt;
	}
	
	public function dataForm($task,$type){
                $colors=Color::getConstants();
		$df=$this->_semantic->dataForm("frm-".$type,$task);
		$df->setFields(["title\n", "content", "id\n", "color"]);
		$df->setCaptions(["Modification", "Content","","Color"]);
                $df->fieldAsDropDown("color",\array_combine($colors,$colors));
		$df->fieldAsMessage(0,["icon"=>"info circle"]);
		$df->fieldAsHidden(2);
		$df->fieldAsInput("content",["rules"=>"empty"]);
		$df->setValidationParams(["on"=>"blur","inline"=>true]);
		$df->setSubmitParams("tasks/update","#frm",["attr"=>"","hasLoader"=>false]);
		return $df;
	}
	
}