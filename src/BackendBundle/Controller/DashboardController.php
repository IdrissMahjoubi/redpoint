<?php

namespace BackendBundle\Controller;

use UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DashboardController extends Controller
{

    public function IndexAction(Request $request)
    {
        $users=$this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->render('@Backend/Users/index.html.twig',['users' => $users]);
    }
}
