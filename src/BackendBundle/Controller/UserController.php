<?php

namespace BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\Company;
use UserBundle\Entity\Member;
use UserBundle\Entity\User;


class UserController extends Controller
{
    public function showUsersCompaniesAction()
    {
        $users=$this->getDoctrine()->getRepository(Company::class)->findAll();

        return $this->render('@Backend/Users/companies_show.html.twig',['users' => $users]);
    }

    public function showUsersMembersAction()
    {
        $users=$this->getDoctrine()->getRepository(Member::class)->findAll();

        return $this->render('@Backend/Users/members_show.html.twig',['users' => $users]);
    }

    public function enableUserAction(User $user)
    {
        $em = $this->getDoctrine()->getManager();
        if ($user instanceof Company) {
                $user->setEnabled(!$user->isEnabled());
                $em->flush();
            return $this->redirectToRoute('users_show_companies');
        }
        $user->setEnabled(!$user->isEnabled());
        $em->flush();
        return $this->redirectToRoute('users_show_members');

    }

}
