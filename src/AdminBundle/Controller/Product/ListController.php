<?php

namespace AdminBundle\Controller\Product;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of ProductController
 *
 * @author hoanvaidai
 */
class ListController extends Controller {

    public function indexAction() {
        $repository = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Product');
        $products = $repository->findAll();
        return $this->render('AdminBundle:Product:list.html.twig', array('products' => $products));
    }

}
