<?php

namespace AdminBundle\Controller\Category;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AdminBundle\Form\Type\AddCategoryType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of AddController
 *
 * @author hoanvaidai
 */
class ListController extends Controller {

    public function indexAction(Request $request) {
        $formAddProduct = $this->createForm(new AddCategoryType(), array(), array(
            'method' => 'POST',
            'action' => $this->generateUrl('admin_category_list')
        ));

        $formAddProduct->handleRequest($request);
        if ($formAddProduct->isValid()) {
            $formData = $formAddProduct->getData();
            $category = new \AdminBundle\Entity\Category();
            $category->setName($formData['name']);
            $category->setSlug($formData['slug']);
            $category->setDescription($formData['description']);
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_category_list'));
        } else {
            $repository = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Category');
            $categories = $repository->findAll();
            $form = $formAddProduct->createView();
            return $this->render('AdminBundle:Category:list.html.twig', array(
                        'form' => $form,
                        'categories' => $categories
            ));
        }
    }

}
