<?php

namespace AdminBundle\Helpers;

use Doctrine\ORM\EntityManager;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RepositoryHelper
 *
 * @author hoanvaidai
 */
class RepositoryHelper {

    protected $manager;

    public function __construct(EntityManager $manager) {
        $this->manager = $manager;
    }

    public function getRepository() {
        $repository = $this->manager->getRepository("AdminBundle:User");
        return $repository;
    }

}
