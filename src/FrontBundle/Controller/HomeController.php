<?php

namespace FrontBundle\Controller;

use FrontBundle\Entity\Pricing;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Front/Home/index.html.twig');
    }

    public function shopAccountAction()
    {
        return $this->render('@Front/Home/shop_account.html.twig');
    }

    public function shopProductAction()
    {
        return $this->render('@Front/Home/shop_product.html.twig');
    }

    public function shopCartAction()
    {
        return $this->render('@Front/Home/shop_cart.html.twig');
    }

    public function pricingAction()
    {
        $pricings = $this->getDoctrine()->getRepository(Pricing::class)->findAll();

        return $this->render('@Front/Home/pricing.html.twig', ['princings' => $pricings]);
    }




}
