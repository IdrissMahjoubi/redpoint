<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BackendBundle\Form\ContactType;


class ContactController extends Controller
{



    public function showContactAction()
    {
        $contacts=$this->getDoctrine()->getRepository(Contact::class)->findAll();

        return $this->render('@Backend/Contact/contact_show.html.twig',['contact' => $contacts]);
    }


    public function editContactAction(Request $request,Contact $contact)
    {

        $form = $this->createForm(ContactType::class,$contact, array(
            'attr' => array('class'=>'form-horizontal'),
        ));
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid())
        {

            $this->getDoctrine()->getManager()->flush();

            {return $this->redirectToRoute('contact_show');}
        }

        return $this->render('@Backend/Contact/contact_edit.html.twig', array(
            'contact' => $contact,
            'form' => $form->createView(),
        ));
    }


}
