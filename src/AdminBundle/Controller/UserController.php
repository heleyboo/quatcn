<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AdminBundle\Services\UserService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author hoanvaidai
 */
class UserController extends Controller {

    private $service = 'user.service.class';

    /**
     *
     * @return UserService
     */
    public function getService() {
        return $this->get('user.service.class');
    }

    public function getRequest() {
        return $this->container->get('request_stack')->getCurrentRequest();
    }

    public function indexAction($page = 1) {
        $request = $this->getRequest();
        $role = $request->query->get('role');
        $keyWord = $request->query->get('keyword');
        $queryString = $request->getQueryString();
        $pageSize = 5;
        $paginator = $this->getService()->getListUser($role, $keyWord);
        $totalRecords = $paginator->count();
        $totalPages = ceil($totalRecords / $pageSize);
        $pageDisplays = 5;
        if (1 == $page) {
            $fromPage = $page;
        }
        if ($page >= 2) {
            $fromPage = $page - 1;
        }

        $toPage = $fromPage + ($pageDisplays - 1);
        if ($toPage >= $totalPages) {
            $toPage = $totalPages;
        }
        if ($toPage == $totalPages) {
            $fromPage = $totalPages - ($pageDisplays - 1);
        }
//        $users = $paginator->getQuery()
//                ->setFirstResult($pageSize * ($page - 1))
//                ->setMaxResults($pageSize)
//                ->getResult();
        $users = $this->getService()->getAllUser();
        return $this->render('AdminBundle:User:list.html.twig', array(
                    'users' => $users,
                    'totalPages' => $totalPages,
                    'currentPage' => $page,
                    'fromPage' => $fromPage,
                    'toPage' => $toPage,
                    'queryString' => $queryString,
                    'pageSize' => $pageSize,
                    'totalRecords' => $paginator->count()
        ));
    }

    public function showAction($userId) {
        //get User data
        $service = $this->getService();
        $user = $service->getUser($userId);
        // serialize user object to json
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($user, 'json');
        // respond json
        $response = new Response();
        $response->setContent($jsonContent);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

}
