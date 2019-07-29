<?php

namespace FrontendBundle\Controller;

use BackendBundle\Entity\Gallery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine();

        $sliders = $em->getRepository(Gallery::class)->findBy(['type'=>'slider']);

        return $this->render('@Frontend/Home/index.html.twig',['sliderOne' => $sliders[0],'sliderTwo' => $sliders[1],'sliderThree' => $sliders[2]]);
    }

    public function shopAction()
    {
        return $this->render('@Frontend/Home/shop.html.twig');
    }

    public function productAction()
    {
        return $this->render('@Frontend/Home/product.html.twig');
    }

    public function cartAction()
    {
        return $this->render('@Frontend/Home/cart.html.twig');
    }

    public function contactAction()
    {
        return $this->render('@Frontend/Home/contact.html.twig');
    }

    public function checkoutAction()
    {
        return $this->render('@Frontend/Home/checkout.html.twig');
    }


//    public function pricingAction()
//    {
//        $pricings = $this->getDoctrine()->getRepository(Pricing::class)->findAll();
//
//        return $this->render('@Frontend/Home/pricing.html.twig', ['princings' => $pricings]);
//    }




}
