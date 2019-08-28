<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\Pricing;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Asset\Package;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\Company;
use UserBundle\Entity\Member;
use UserBundle\Entity\User;


class UserController extends Controller
{
    public function showUsersCompaniesAction()
    {
        $em = $this->getDoctrine();

        $users = $em->getRepository(Company::class)->findAll();
        $package = $em->getRepository(Pricing::class)->getPricingByType(1);
        return $this->render('@Backend/Users/companies_show.html.twig', ['users' => $users, 'package' => $package]);
    }

    public function showUsersMembersAction()
    {
        $em = $this->getDoctrine();
        $users = $em->getRepository(Member::class)->findAll();
        $package = $em->getRepository(Pricing::class)->getPricingByType(0);
        return $this->render('@Backend/Users/members_show.html.twig', ['users' => $users, 'package' => $package]);
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

    public function upgradeUserAction(User $user,Pricing $pricing)
    {
        $em = $this->getDoctrine()->getManager();
        if ($user->hasRole('ROLE_COMPANY')) {
            $user->setPackage($pricing);
            $em->flush();
            return $this->redirectToRoute('users_show_companies');
        }else {
            $user->setPackage($pricing);
            $em->flush();
            return $this->redirectToRoute('users_show_members');
        }
    }

}
