<?php

namespace FrontendBundle\Controller;

use BackendBundle\Entity\Gallery;
use BackendBundle\Entity\Product;
use BackendBundle\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine();

        $sliders = $em->getRepository(Gallery::class)->findBy(['type' => 'slider']);
        $products = $em->getRepository(Product::class)->findAll();
        $publicity = $em->getRepository(Gallery::class)->findOneBy(['type' => 'publicity']);

        return $this->render('@Frontend/Home/index.html.twig', ['publicity' => $publicity, 'products' => $products, 'sliderOne' => $sliders[0], 'sliderTwo' => $sliders[1], 'sliderThree' => $sliders[2]]);
    }

    public function postProductAction(Request $request)
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

//        dump($request);die();

        if ($request->getMethod() == Request::METHOD_POST) {
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine();
                $em->getManager()->persist($product);
                $em->getManager()->flush();
                return $this->redirectToRoute('homepage');
            }
        }

        return $this->render('@Frontend/Home/post.html.twig', ['form' => $form->createView()]);

    }

    public function shopAction()
    {
        $em = $this->getDoctrine();
        $publicity = $em->getRepository(Gallery::class)->findOneBy(['type' => 'publicity']);

        return $this->render('@Frontend/Home/shop.html.twig', ['publicity' => $publicity]);
    }

    public function wishlistAction()
    {
        return $this->render('@Frontend/Home/wishlist.html.twig', []);

    }

    public function accountAction()
    {
        return $this->render('@Frontend/Home/account.html.twig', []);

    }

    public function productAction(Product $product)
    {
        $em = $this->getDoctrine();
        $productDetails = $em->getRepository(Product::class)->find($product);
        $publicity = $em->getRepository(Gallery::class)->findOneBy(['type' => 'publicity']);

        return $this->render('@Frontend/Home/product.html.twig', ['publicity' => $publicity, 'product' => $productDetails]);
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
