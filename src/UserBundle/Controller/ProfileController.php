<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 25/08/2019
 * Time: 18:48
 */

namespace UserBundle\Controller;


use FOS\UserBundle\Form\Factory\FactoryInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\User\UserInterface;
use UserBundle\Entity\Company;
use UserBundle\Entity\Member;
use UserBundle\Form\CompanyType;
use UserBundle\Form\MemberType;
use UserBundle\Form\ProfileCompanyType;
use UserBundle\Form\ProfileMemberType;
use UserBundle\Form\UserType;

class ProfileController extends Controller
{


    /**
     * Show the user.
     */
    public function showAction()
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        return $this->render('@User/Profile/show.html.twig', array(
            'user' => $user,
        ));
    }

    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        if ($user->hasRole('ROLE_MEMBER'))
        {
            $form = $this->createForm(ProfileMemberType::class, $user);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $em->flush();
            return $this->redirectToRoute('homepage');
            }

        }
        else if ($user->hasRole('ROLE_COMPANY'))
        {
            $form = $this->createForm(ProfileCompanyType::class, $user);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $em->flush();
                return $this->redirectToRoute('homepage');

            }

        }else{
            $form = $this->createForm(UserType::class, $user);

        }



        return $this->render('@User/Profile/edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}