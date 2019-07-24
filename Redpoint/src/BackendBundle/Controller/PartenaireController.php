<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\Gallery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BackendBundle\Form\GalleryType;




class PartenaireController extends Controller
{
    public function addPartenaireAction(Request $request)
    {

        $partenaire = new Gallery();
        $form = $this->createForm(GalleryType::class, $partenaire, array(
            'attr' => array('class' => 'form-horizontal'),
        ));


        if ($request->getMethod() == Request::METHOD_POST) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $partenaire->setType('partenaire');
                $em = $this->getDoctrine()->getManager();
                $em->persist($partenaire);
                $em->flush();
                return $this->redirectToRoute('partenaire_show');
            }
        }

        return $this->render('@Backend/Partenaire/partenaire_add.html.twig', ['form' => $form->createView()]);
    }

    public function showPartenaireAction()
    {
        $em = $this->getDoctrine()->getRepository(Gallery::class);
        $partenaire = $em->findBy(['type' => 'partenaire']);

        return $this->render('@Backend/Partenaire/partenaire_show.html.twig', ['partenaire' => $partenaire]);
    }


    public function editPartenaireAction(Request $request, Gallery $partenaire)
    {
        $form = $this->createForm(GalleryType::class, $partenaire, array(
            'attr' => array('class' => 'form-horizontal'),
        ));
        if ($request->getMethod() == Request::METHOD_POST) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid())

            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('partenaire_show');
        }

       return $this->render('@Backend/Partenaire/partenaire_edit.html.twig', array(
           'partenaire' => $partenaire,
           'form' => $form->createView(),
       ));
   }



   public function deletePartenaireAction(Request $request,Gallery $partenaire)
   {
       $em=$this->getDoctrine()->getManager();
       $em->remove($partenaire->getImage());
       $em->remove($partenaire);
       $em->flush();

       return $this->redirectToRoute('partenaire_delete');
   }







}
