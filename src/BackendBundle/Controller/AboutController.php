<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\Gallery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use BackendBundle\Form\GalleryType;


class AboutController extends Controller
{





    public function AboutAction(Request $request)
    {

        $about=$this->getDoctrine()->getRepository(Gallery::class)->findOneBy(['type'=>'about']);

        if($about == null)
        {
            $gallery = new Gallery();
            $form = $this->createForm(GalleryType::class, $gallery, array(
                'attr' => array('class' => 'form-horizontal'),
            ));


            if ($request->getMethod() == Request::METHOD_POST) {
                $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid()) {
                    $gallery->setType('about');
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($gallery);
                    $em->flush();
                    return $this->redirectToRoute('about');
                }
            }

            return $this->render('@Backend/About/about_add.html.twig', ['form' => $form->createView()]);
        }else
        {
            $form = $this->createForm(GalleryType::class, $about, array(
                'attr' => array('class' => 'form-horizontal'),
            ));
            if ($request->getMethod() == Request::METHOD_POST) {
                $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid())

                    $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('about');
            }

            return $this->render('@Backend/About/about_edit.html.twig', array(
                'about' => $about,
                'form' => $form->createView(),
            ));        }

    }








}
