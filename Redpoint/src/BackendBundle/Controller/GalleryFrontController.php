<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\Gallery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BackendBundle\Form\GalleryType;




class GalleryFrontController extends Controller
{
    public function addGalleryAction(Request $request)
    {

        $gallery = new Gallery();
        $form = $this->createForm(GalleryType::class, $gallery, array(
            'attr' => array('class' => 'form-horizontal'),
        ));

        $em = $this->getDoctrine()->getRepository(Gallery::class);
        $galleries = $em->findBy(['type' => 'galleryfront']);

        if(count($galleries)>=6)
        {
            return $this->render('@Backend/GalleryFront/gallery_full.html.twig');
        }else {

            if ($request->getMethod() == Request::METHOD_POST) {
                $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid()) {
                    $gallery->setType('galleryfront');
                    //$gallery->setPath($filename);
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($gallery);
                    $em->flush();
                    return $this->redirectToRoute('gallery_front_show');
                }
            }
        }

        return $this->render('@Backend/GalleryFront/gallery_add.html.twig', ['form' => $form->createView()]);
    }

    public function showGalleryAction()
    {
        $em = $this->getDoctrine()->getRepository(Gallery::class);
        $gallery = $em->findBy(['type' => 'galleryfront']);

        return $this->render('@Backend/GalleryFront/gallery_show.html.twig', ['gallery' => $gallery]);
    }


    public function editGalleryAction(Request $request, Gallery $gallery)
    {
        $form = $this->createForm(GalleryType::class, $gallery, array(
            'attr' => array('class' => 'form-horizontal'),
        ));
        if ($request->getMethod() == Request::METHOD_POST) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid())

            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('gallery_front_show');
        }

       return $this->render('@Backend/GalleryFront/gallery_edit.html.twig', array(
           'gallery' => $gallery,
           'form' => $form->createView(),
       ));
   }



   public function deleteGalleryAction(Request $request,Gallery $gallery)
   {
       $em=$this->getDoctrine()->getManager();
       $em->remove($gallery->getImage());
       $em->remove($gallery);
       $em->flush();

       return $this->redirectToRoute('gallery_front_show');
   }







}
