<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\Gallery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use BackendBundle\Form\GalleryType;


class SliderController extends Controller
{



    public function addSliderAction(Request $request)
    {
        $slider = new Gallery();
        $form = $this->createForm(GalleryType::class, $slider, array(
            'attr' => array('class' => 'form-horizontal'),
        ));


        if ($request->getMethod() == Request::METHOD_POST) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $slider->setType('slider');
                $em = $this->getDoctrine()->getManager();
                $em->persist($slider);
                $em->flush();
                return $this->redirectToRoute('slider_show');
            }
        }

        return $this->render('@Backend/Slider/slider_add.html.twig', ['form' => $form->createView()]);
    }

    public function showSliderAction()
    {
        $em=$this->getDoctrine()->getRepository(Gallery::class);
        $slider=$em->findBy(['type'=>'slider']);

        return $this->render('@Backend/Slider/slider_show.html.twig',['slider' => $slider]);
    }


    public function editSliderAction(Request $request,Gallery $slider)
    {
        $form = $this->createForm(GalleryType::class, $slider, array(
            'attr' => array('class' => 'form-horizontal'),
        ));
        if ($request->getMethod() == Request::METHOD_POST) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid())

                $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('slider_show');
        }

        return $this->render('@Backend/Slider/slider_edit.html.twig', array(
            'slider' => $slider,
            'form' => $form->createView(),
        ));
    }



    public function deleteSliderAction(Request $request,Gallery $slider)
    {

        $em=$this->getDoctrine()->getManager();
        $em->remove($slider->getImage());
        $em->remove($slider);
        $em->flush();

        return $this->redirectToRoute('slider_show');
    }







}
