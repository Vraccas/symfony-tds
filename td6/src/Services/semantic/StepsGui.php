<?php 
namespace App\Services\semantic;

use Ajax\semantic\html\elements\HtmlLabel;
use App\Entity\Step;
use Ajax\semantic\html\base\constants\Color;

class StepsGui extends SemanticGui{
	
	public function dataTable($steps,$type){
		$dt=$this->_semantic->dataTable("dt-".$type, "App\Entity\Step", $steps);
		$dt->setIdentifierFunction("getId");
		$dt->setFields(["step"]);
                $dt->setCaptions(["Step"]);
                $dt->setValueFunction("step", function($v,$step){
			return $step->getTitle();
		});
		$dt->addEditDeleteButtons(false, [ "ajaxTransition" => "random","hasLoader"=>false ], function ($bt) {
			$bt->addClass("circular");
		}, function ($bt) {
			$bt->addClass("circular");
		});
		$dt->onPreCompile(function () use (&$dt) {
			$dt->getHtmlComponent()->colRight(1);
		});
		$dt->setUrls(["edit"=>"steps/edit","delete"=>"steps/confirmDelete"]);
		$dt->setTargetSelector("#frm");
		return $dt;
	}
	
	public function dataForm($step,$type,$di=null){
		$df=$this->_semantic->dataForm("frm-".$type,$step);
		$df->setFields(["title\n", "title", "id\n"]);
		$df->setCaptions(["Modification", "Title",""]);
		$df->fieldAsMessage(0,["icon"=>"info circle"]);
		$df->fieldAsHidden(2);
		$df->fieldAsInput("title",["rules"=>"empty"]);
		$df->setValidationParams(["on"=>"blur","inline"=>true]);
		$df->setSubmitParams("steps/update","#frm",["attr"=>"","hasLoader"=>false]);
		return $df;
	}
	
}