<?php

namespace AdminBundle\Controller\Site;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AdminBundle\Form\Type\AddCategoryType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of HomeController
 *
 * @author hoanvaidai
 */
class HomeController extends Controller {

    public function indexAction() {

        return $this->render('AdminBundle:Site:home.html.twig');
    }

}
