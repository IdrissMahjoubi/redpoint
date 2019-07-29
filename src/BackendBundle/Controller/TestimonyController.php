<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\Gallery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BackendBundle\Form\GalleryType;




class TestimonyController extends Controller
{
    public function addTestimonyAction(Request $request)
    {

        $testimony = new Gallery();
        $form = $this->createForm(GalleryType::class, $testimony, array(
            'attr' => array('class' => 'form-horizontal'),
        ));


        if ($request->getMethod() == Request::METHOD_POST) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $testimony->setType('testimony');
                $em = $this->getDoctrine()->getManager();
                $em->persist($testimony);
                $em->flush();
                return $this->redirectToRoute('testimony_show');
            }
        }

        return $this->render('@Backend/Testimony/testimony_add.html.twig', ['form' => $form->createView()]);
    }

    public function showTestimonyAction()
    {
        $em = $this->getDoctrine()->getRepository(Gallery::class);
        $testimony = $em->findBy(['type' => 'testimony']);

        return $this->render('@Backend/Testimony/testimony_show.html.twig', ['testimony' => $testimony]);
    }


    public function editTestimonyAction(Request $request, Gallery $testimony)
    {
        $form = $this->createForm(GalleryType::class, $testimony, array(
            'attr' => array('class' => 'form-horizontal'),
        ));
        if ($request->getMethod() == Request::METHOD_POST) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()){

                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('testimony_show');
            }

        }

       return $this->render('@Backend/Testimony/testimony_edit.html.twig', array(
           'testimony' => $testimony,
           'form' => $form->createView(),
       ));
   }



   public function deleteTestimonyAction(Request $request,Gallery $testimony)
   {
       $em=$this->getDoctrine()->getManager();
       $em->remove($testimony->getImage());
       $em->remove($testimony);
       $em->flush();

       return $this->redirectToRoute('testimony_show');
   }
}
