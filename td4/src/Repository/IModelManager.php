<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repository;

/**
 *
 * @author Yves
 */
interface IModelManager {
    
    public function getAll();
    public function insert($object);
    public function update($object, $values);
    public function delete($index);
    public function filterBy($keysAndValues);
    public function get($index);
    public function compter();
    
}
