<?php

namespace FrontendBundle\Controller;

use BackendBundle\Entity\Gallery;
use BackendBundle\Entity\Media;
use BackendBundle\Entity\Pricing;
use BackendBundle\Entity\Product;
use BackendBundle\Entity\SubCategory;
use BackendBundle\Entity\Categories;

use BackendBundle\Form\MediaType;
use BackendBundle\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    protected $entityManager;
    protected $translator;
    protected $repository;

    // Set up all necessary variable
    protected function initialise()
    {
        $this->entityManager = $this->getDoctrine()->getManager();
        $this->repository = $this->entityManager->getRepository('BackendBundle:Product');
        $this->translator = $this->get('translator');
    }

    public function myProductAction()
    {
        $em = $this->getDoctrine();
        $products = $em->getRepository(Product::class)->findAll();
        return $this->render('@Frontend/Home/my_products.html.twig', ['products' => $products]);
    }

    public function deleteProductAction(Product $product)
    {
        $em = $this->getDoctrine()->getManager();
        foreach ($product->getImages() as $image){
            $product->removeImage($image);
        }
        $em->remove($product);
        $em->flush();
        return $this->redirectToRoute('front_my_products');
    }

    public function editProductAction(Request $request,Product $product)
    {
        // Set up required variables
        $this->initialise();


        // Build the form
        $form = $this->get('form.factory')->create(ProductType::class, $product);

        if ($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            // Check form data is valid
            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $em->flush();

                // Redirect to view page
                return $this->redirectToRoute('front_my_products');
            }
        }
        $images = $product->getImages()->toArray();
        return $this->render('@Frontend/Home/edit_product.html.twig', ['form' => $form->createView(),'images' => $images]);

    }

    public function indexAction()
    {
        var_dump($this->getUser());
        die();
        $em = $this->getDoctrine();

        $sliders = $em->getRepository(Gallery::class)->findBy(['type' => 'slider']);
        $products = $em->getRepository(Product::class)->findAll();
        $publicity = $em->getRepository(Gallery::class)->findOneBy(['type' => 'publicity']);

        $categories = $em->getRepository(Categories::class)->findAll();
        foreach ($categories as $item)
        {
            $subcategories[$item->getName()] = $em->getRepository(SubCategory::class)->findBy(['category'=> $item->getId()]);

        }

        /*foreach ($subcategories as $key => $item) {
            dump('cat '. $key);
            foreach ($item as $fuck => $value) {
                dump( ' sub ' . $value->getName());
            }
        }
        die();*/
        return $this->render('@Frontend/Home/index.html.twig', ['subCategories' => $subcategories, 'publicity' => $publicity, 'products' => $products, 'sliderOne' => $sliders[0], 'sliderTwo' => $sliders[1], 'sliderThree' => $sliders[2]]);
    }

    public function postProductAction(Request $request)
    {
        // Set up required variables
        $this->initialise();

        // New object
        $product = new Product();

        // Build the form
        $form = $this->get('form.factory')->create(ProductType::class, $product);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            // Check form data is valid
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($product);
                $em->flush();

                // Redirect to view page
                return $this->redirectToRoute('homepage');
            }
        }
        return $this->render('@Frontend/Home/post.html.twig', ['form' => $form->createView()]);

    }


    public function shopAction()
    {
        $em = $this->getDoctrine();
        $publicity = $em->getRepository(Gallery::class)->findOneBy(['type' => 'publicity']);
        $categories = $em->getRepository(Categories::class)->findAll();
        foreach ($categories as $item)
        {
            $subcategories[$item->getName()] = $em->getRepository(SubCategory::class)->findBy(['category'=> $item->getId()]);
        }

        return $this->render('@Frontend/Home/shop.html.twig', ['publicity' => $publicity, 'subCategories' => $subcategories]);
    }

    public function wishlistAction()
    {
        return $this->render('@Frontend/Home/wishlist.html.twig', []);

    }

    public function accountAction()
    {
        $user = $this->getUser();

        return $this->render('@Frontend/Home/account.html.twig', ['user' => $user]);

    }

    public function productAction(Product $product)
    {
        $em = $this->getDoctrine();
        $productDetails = $em->getRepository(Product::class)->find($product);
        $publicity = $em->getRepository(Gallery::class)->findOneBy(['type' => 'publicity']);

        $categories = $em->getRepository(Categories::class)->findAll();
        foreach ($categories as $item)
        {
            $subcategories[$item->getName()] = $em->getRepository(SubCategory::class)->findBy(['category'=> $item->getId()]);
        }

        return $this->render('@Frontend/Home/product.html.twig', ['subCategories' => $subcategories,'publicity' => $publicity, 'product' => $productDetails]);
    }

    public function cartAction()
    {
        return $this->render('@Frontend/Home/cart.html.twig');
    }

    public function contactAction()
    {
        return $this->render('@Frontend/Home/contact.html.twig');
    }

    public function deleteImageAction(Media $media)
    {
        $em = $this->getDoctrine()->getManager();
        $media->getProduct()->removeImage($media);
        $em->flush();
        return $this->redirectToRoute('front_edit_product',['id'=>$media->getProduct()->getId()]);
    }

    public function checkoutAction()
    {
        return $this->render('@Frontend/Home/checkout.html.twig');
    }


    public function pricingAction()
    {
        $pricings = $this->getDoctrine()->getRepository(Pricing::class)->findAll();

        return $this->render('@Frontend/Home/pricing.html.twig', ['princings' => $pricings]);
    }


}
