<?php

namespace BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;


class UserController extends Controller
{
    public function showUsersAction()
    {
        $users=$this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->render('@Backend/Users/contact_show.html.twig',['users' => $users]);
    }
}
