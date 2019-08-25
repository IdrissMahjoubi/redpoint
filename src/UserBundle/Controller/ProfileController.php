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
use UserBundle\Form\CompanyType;
use UserBundle\Form\MemberType;

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
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        if (in_array('ROLE_MEMBER',$user->getRoles()))
        {
            $form = $this->createForm(MemberType::class, $user);
            $form->setData($user);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $em->persist($user);
                $em->flush();

            }

        }
        else if (in_array('ROLE_COMPANY',$user->getRoles()))
        {
            $form = $this->createForm(CompanyType::class, $user);
            $form->setData($user);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $em->persist($user);
                $em->flush();

            }

        }



        return $this->render('@User/Profile/edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}