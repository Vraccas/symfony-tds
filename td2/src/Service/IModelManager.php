<?php

namespace App\Service;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IModelManager
 *
 * @author Yves
 */
interface IModelManager {
   
    public function getAll();
    public function insertion($objet);
    public function update($object, $values);
    public function delete($indexes);
    public function get($index);
    public function filterBy($keysAndValues);
    public function compter();
    public function select($indexes);
}
