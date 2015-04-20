<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of HomeController
 *
 * @author hoanvaidai
 */
class HomeController extends Controller {

    public function indexAction() {

        $userService = $this->get('user.service.class');
        $repository1 = $userService->getRepositories();
        var_dump($userService);
        exit;
        return $this->render('AdminBundle:Default:index.html.twig', array(
                    'users' => $users,
                    'product' => $product,
                    'categoryName' => $categoryName
        ));
    }

}
