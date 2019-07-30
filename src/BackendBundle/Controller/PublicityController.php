<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\Gallery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BackendBundle\Form\GalleryType;




class PublicityController extends Controller
{
    public function PublicityAction(Request $request)
    {

        $publicity=$this->getDoctrine()->getRepository(Gallery::class)->findOneBy(['type'=>'publicity']);

        if($publicity == null)
        {
            $gallery = new Gallery();
            $form = $this->createForm(GalleryType::class, $gallery, array(
                'attr' => array('class' => 'form-horizontal'),
            ));


            if ($request->getMethod() == Request::METHOD_POST) {
                $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid()) {
                    $gallery->setType('publicity');
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($gallery);
                    $em->flush();
                    return $this->redirectToRoute('publicity');
                }
            }

            return $this->render('@Backend/Publicity/publicity_add.html.twig', ['form' => $form->createView()]);
        }else
        {
            $form = $this->createForm(GalleryType::class, $publicity, array(
                'attr' => array('class' => 'form-horizontal'),
            ));
            if ($request->getMethod() == Request::METHOD_POST) {
                $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid())

                    $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('publicity');
            }

            return $this->render('@Backend/Publicity/publicity_edit.html.twig', array(
                'publicity' => $publicity,
                'form' => $form->createView(),
            ));        }

    }







}
