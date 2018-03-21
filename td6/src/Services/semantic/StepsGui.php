<?php

namespace App\Services\semantic;

use Ajax\semantic\html\elements\HtmlLabel;
use App\Entity\Step;
use Ajax\semantic\html\base\constants\Color;

class StepsGui extends SemanticGui{
	public function dataTable($steps,$type){
		$dt=$this->_semantic->dataTable("dt-".$type, "App\Entity\Step", $steps);
		$dt->setFields(["step"]);
		$dt->setCaptions(["Step"]);
		$dt->setValueFunction("step", function($v,$step){
			$lbl=new HtmlLabel("",$step->getTitle());
			return $lbl;
		});
		$dt->addEditButton(true,["ajaxTransition"=>"random"]);
		$dt->setUrls(["edit"=>"step/update"]);
		$dt->setTargetSelector("#update-step");
		return $dt;
	}

	public function frm(Step $step){
		$colors=Color::getConstants();
		$frm=$this->_semantic->dataForm("frm-step", $step);
		$frm->setFields(["id","title","submit","cancel"]);
		$frm->setCaptions(["","Title","Valider","Annuler"]);
		$frm->fieldAsHidden("id");
		$frm->fieldAsInput("title",["rules"=>["empty","maxLength[30]"]]);
		$frm->setValidationParams(["on"=>"blur","inline"=>true]);
		$frm->onSuccess("$('#frm-step').hide();");
		$frm->fieldAsSubmit("submit","positive","step/submit", "#dt-steps",["ajax"=>["attr"=>"","jqueryDone"=>"replaceWith"]]);
		$frm->fieldAsLink("cancel",["class"=>"ui button cancel"]);
		$this->click(".cancel","$('#frm-step').hide();");
		$frm->addSeparatorAfter("title");
		return $frm;
	}
}

