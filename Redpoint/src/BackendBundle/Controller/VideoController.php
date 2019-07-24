<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\Socialmedia;
use BackendBundle\Entity\Video;
use BackendBundle\Form\SocialmediaType;
use BackendBundle\Form\VideoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class VideoController extends Controller
{

    public function addVideoAction(Request $request)
    {

        $video = new Video();
        $form = $this->createForm(VideoType::class, $video, array(
            'attr' => array('class' => 'form-horizontal'),
        ));


        if ($request->getMethod() == Request::METHOD_POST) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($video);
                $em->flush();
                return $this->redirectToRoute('video_show');
            }
        }

        return $this->render('@Backend/Video/video_add.html.twig', ['form' => $form->createView()]);
    }

    public function showVideoAction()
    {
        $em = $this->getDoctrine()->getRepository(Video::class);
        $video = $em->findAll();

        return $this->render('@Backend/Video/video_show.html.twig', ['video' => $video]);
    }


    public function editVideoAction(Request $request, Video $video)
    {
        $form = $this->createForm(VideoType::class, $video, array(
            'attr' => array('class' => 'form-horizontal'),
        ));
        if ($request->getMethod() == Request::METHOD_POST) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid())

                $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('video_show');
        }

        return $this->render('@Backend/Video/video_edit.html.twig', array(
            'video' => $video,
            'form' => $form->createView(),
        ));
    }



    public function deleteVideoAction(Request $request,Video $video)
    {
        $em=$this->getDoctrine()->getManager();
        $em->remove($video->getImage());
        $em->remove($video);
        $em->flush();

        return $this->redirectToRoute('video_show');
    }

}
