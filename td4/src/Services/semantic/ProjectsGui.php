<?php

namespace App\Services\semantic;
 
use Ajax\php\symfony\JquerySemantic;
 
class ProjectsGui extends JquerySemantic{
    public function button(){
        $bt=$this->semantic()->htmlButton("btProjects","Projets","orange");
        $bt->getOnClick($this->getUrl("/projects"),"#response",["attr"=>""]);
        return $bt;//Ici, fondamentalement, le boutton ne sert à rien au fonctionnement du truc, c'est pour ça qu'on ne retourne rien dans la méthode buttons
    }
    
    public function buttons(){
        $bts=$this->_semantic->htmlButtonGroups("bts",["Projects","Tags", "Developers"]);
        $bts->addIcons(["folder","tags", "folder"]);
        $bts->setPropertyValues("data-url", ["projects","tags", "developers"]); //les valeurs dans le tableau correspondent aux noms des routes auxquelles on souhaite acceder
        //Values in the array above are linked to the route's name we want to access
        $bts->getOnClick("","#response",["attr"=>"data-url"]);
    }
}