<?php

namespace AdminBundle\Services;

use Doctrine\ORM\EntityManager;
use AdminBundle\Entity\User;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * Description of UserService
 *
 * @author hoanvaidai
 */
class UserService {

    protected $manager;

    /**
     *
     * @param EntityManager $manager
     */
    public function __construct(EntityManager $manager) {
        $this->manager = $manager;
    }

    /**
     *
     * @return \Doctrine\ORM\EntityRepository The repository class.
     */
    private function getRepository() {
        return $this->manager->getRepository('AdminBundle:User');
    }

    /**
     *
     * @param type $pageSize
     * @param type $page
     * @param type $role
     * @param type $keyWord
     * @return Paginator
     */
    public function getListUser($role, $keyWord) {
        $repository = $this->getRepository();
        $query = $repository->createQueryBuilder('u')->where('1=1');
        if (!empty($keyWord)) {
            $query->andwhere('u.username LIKE :keyword');
            $query->orWhere('u.firstname LIKE :keyword');
            $query->orWhere('u.lastname LIKE :keyword');
            $query->orWhere('u.email LIKE :keyword');
            $query->setParameter('keyword', '%' . $keyWord . '%');
        }
        if (empty($role)) {
            $query->andWhere('u.role > 0');
        } else {
            $query->andWhere('u.role = :role');
            $query->setParameter('role', $role);
        }
        $query->orderBy('u.username', 'ASC');
        return new Paginator($query);
    }

    /**
     *
     * @param type $fillter
     * @return Paginator
     */
    public function getListUserByFillter($fillter) {
        $keyword = $fillter['keyword'];
        $role = $fillter['role'];
        $orderField = $fillter['orderField'];
        $orderBy = $fillter['orderBy'];

        $repository = $this->getRepository();
        $query = $repository->createQueryBuilder('u')->where('1=1');

        if (!empty($fillter['keyword'])) {
            $query->andwhere('u.username LIKE :keyword');
            $query->orWhere('u.firstname LIKE :keyword');
            $query->orWhere('u.lastname LIKE :keyword');
            $query->orWhere('u.email LIKE :keyword');
            $query->setParameter('keyword', '%' . $keyword . '%');
        }
        if (empty($role)) {
            $query->andWhere('u.role > 0');
        } else {
            $query->andWhere('u.role = :role');
            $query->setParameter('role', $role);
        }
        $query->orderBy("u.$orderField", "$orderBy");
        return new Paginator($query);
    }

    public function getAllUser() {
        $repository = $this->getRepository();
        return $repository->findAll();
    }

    public function insertBatch() {
        for ($i = 2; $i < 100; $i++) {
            $user = new User();
            $user->setUsername("admin$i");
            $user->setFirstname('Hoan');
            $user->setLastname('Do');
            $user->setEmail("vanhoan$i@gmail.com");
            $user->setPassword('10088621');
            $user->setActive(1);
            $user->setRole(1);
            $user->setCreatedDate(new \DateTime());
            $user->setUpdatedDate(new \DateTime());
            $this->manager->persist($user);
            $this->manager->flush();
        }
    }

    /**
     * Get user
     * @param type $userId
     * @return type
     */
    public function getUser($userId) {
        $repository = $this->getRepository();
        return $repository->find($userId);
    }

}
