<?php

namespace AdminBundle\Controller\Product;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AdminBundle\Form\Type\ProductType;
use AdminBundle\Entity\Product;

/**
 * Description of AddController
 *
 * @author hoanvaidai
 */
class AddController extends Controller {

    public function indexAction() {
        $product = new Product();
        $formAddProduct = $this->createForm(new ProductType(), $product, array(
            'method' => 'POST',
            'action' => $this->generateUrl('admin_product_add')
        ));
        $form = $formAddProduct->createView();
        return $this->render('AdminBundle:Product:add.html.twig', array('form' => $form));
    }

}
