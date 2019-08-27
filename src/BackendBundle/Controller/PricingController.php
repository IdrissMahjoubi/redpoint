<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\Pricing;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BackendBundle\Form\PricingType;


class PricingController extends Controller
{



    public function showPricingAction($for_enterprise)
    {
        $pricing=$this->getDoctrine()->getRepository(Pricing::class)->findBy(['forEnterprise'=>$for_enterprise]);

        return $this->render('@Backend/Pricing/pricing_show.html.twig',['pricing' => $pricing]);
    }


    public function editPricingAction(Request $request,Pricing $pricing)
    {

        $form = $this->createForm(PricingType::class,$pricing, array(
            'attr' => array('class'=>'form-horizontal'),
        ));
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid())
        {

            $this->getDoctrine()->getManager()->flush();

            {return $this->redirectToRoute('pricing_show');}
        }

        return $this->render('@Backend/Pricing/pricing_edit.html.twig', array(
            'pricing' => $pricing,
            'form' => $form->createView(),
        ));
    }


}
