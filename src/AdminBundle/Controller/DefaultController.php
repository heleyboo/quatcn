<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction($name) {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('AdminBundle:User');
        $users = $repository->findAll();

        $product = $this->getDoctrine()
                ->getRepository('AdminBundle:Product')
                ->find(1);

        $categoryName = $product->getCategory();

        return $this->render('AdminBundle:Default:index.html.twig', array(
                    'name' => $name,
                    'users' => $users,
                    'product' => $product,
                    'categoryName' => $categoryName
        ));
    }

}
