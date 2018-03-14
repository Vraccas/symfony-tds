<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Services\semantic;


use Ajax\semantic\html\elements\HtmlLabel;
use App\Entity\Developer;
use Ajax\semantic\html\base\constants\Color;

use Ajax\php\symfony\JquerySemantic;
/**
 * Description of DevelopersGui
 *
 * @author Yves
 */
class DevelopersGui extends JquerySemantic{
    
    public function dataTable($developers){
        $dt=$this->_semantic->dataTable("dtDevelopers", "App\Entity\Developer", $developers); //un dataTable est juste un composant HTML très avancé
        $dt->setFields(["dev"]);
        $dt->setCaptions(["Developers"]);
        $dt->setIdentifierFunction(function($index, $dev){
        
            return $dev->getId();
        });
        $dt->setValueFunction("dev", function($v,$dev){
            $lbl=new HtmlLabel("",$dev->getIdentity());
            return $lbl;
        });
        $dt->addEditButton();
        $dt->insertDeleteButtonIn(1);
        $dt->setUrls(["edit"=>"developer/update", "delete"=>"developer/delete"]);
        $dt->setTargetSelector(["edit" => "#update-dev", "delete"=>"#dev-container"]);
        return $dt;
    }
    
    public function frm(Developer $developer){
        $frm=$this->_semantic->dataForm("frm-dev", $developer);
        $frm->setFields(["id","identity","submit","cancel"]);
        $frm->setCaptions(["","Identity","Validate","Cancel"]);
        $frm->fieldAsHidden("id");
        $frm->fieldAsInput("identity",["rules"=>["empty","maxLength[60]"]]);
        $frm->setValidationParams(["on"=>"blur","inline"=>true]);
        $frm->onSuccess("$('#frm-dev').hide();");
        $frm->fieldAsSubmit("submit","positive","developer/submit", "#dtDevelopers",["ajax"=>["attr"=>"","jqueryDone"=>"replaceWith"]]);
        $frm->fieldAsLink("cancel",["class"=>"ui button cancel"]);
        $this->click(".cancel","$('#frm-dev').hide();");
        $frm->addSeparatorAfter("identity");
        return $frm;
    }
}
