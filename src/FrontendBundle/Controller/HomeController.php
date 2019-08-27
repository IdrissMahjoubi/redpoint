<?php

namespace FrontendBundle\Controller;

use BackendBundle\Controller\UserController;
use BackendBundle\Entity\Gallery;
use BackendBundle\Entity\Media;
use BackendBundle\Entity\Pricing;
use BackendBundle\Entity\Product;
use BackendBundle\Entity\SubCategory;
use BackendBundle\Entity\Categories;

use BackendBundle\Entity\Type;
use BackendBundle\Form\MediaType;
use BackendBundle\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\Company;
use UserBundle\Entity\User;

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
    }

    public function myProductAction()
    {
        $em = $this->getDoctrine();
        $user = $this->getUser();

        $products = $em->getRepository(Product::class)->findBy(['owner'=>$user]);
        return $this->render('@Frontend/Home/my_products.html.twig', ['products' => $products]);
    }

    public function deleteProductAction(Product $product)
    {
        $em = $this->getDoctrine()->getManager();
        foreach ($product->getImages() as $image) {
            $product->removeImage($image);
        }
        $em->remove($product);
        $em->flush();
        return $this->redirectToRoute('front_my_products');
    }

    public function editProductAction(Request $request, Product $product)
    {

        // Build the form
        $form = $this->createForm(ProductType::class, $product);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            // Check form data is valid
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();

                // Redirect to view page
                return $this->redirectToRoute('front_my_products');
            }
        }
        return $this->render('@Frontend/Home/edit_product.html.twig', ['form' => $form->createView()]);

    }

    public function getByCategoryAction(Categories $category)
    {
        $em = $this->getDoctrine();
        $sliders = $em->getRepository(Gallery::class)->findBy(['type' => 'slider']);
        $publicity = $em->getRepository(Gallery::class)->findOneBy(['type' => 'publicity']);
        $categories = $em->getRepository(Categories::class)->findAll();
        $products = $em->getRepository(Product::class)->findBy(['categorie'=>$category]);

        return $this->render('@Frontend/Home/index.html.twig', ['categories' => $categories, 'publicity' => $publicity, 'products' => $products, 'sliderOne' => $sliders[0], 'sliderTwo' => $sliders[1], 'sliderThree' => $sliders[2]]);

    }

    public function getBySubCategoryAction(SubCategory $subCategory)
    {
        $em = $this->getDoctrine();
        $sliders = $em->getRepository(Gallery::class)->findBy(['type' => 'slider']);
        $publicity = $em->getRepository(Gallery::class)->findOneBy(['type' => 'publicity']);
        $categories = $em->getRepository(Categories::class)->findAll();
        $products = $em->getRepository(Product::class)->findBy(['subCategory'=>$subCategory]);

        return $this->render('@Frontend/Home/index.html.twig', ['categories' => $categories, 'publicity' => $publicity, 'products' => $products, 'sliderOne' => $sliders[0], 'sliderTwo' => $sliders[1], 'sliderThree' => $sliders[2]]);
    }

    public function indexAction()
    {

        $em = $this->getDoctrine();

        $sliders = $em->getRepository(Gallery::class)->findBy(['type' => 'slider']);
        $products = $em->getRepository(Product::class)->findAll();
        $publicity = $em->getRepository(Gallery::class)->findOneBy(['type' => 'publicity']);

        $categories = $em->getRepository(Categories::class)->findAll();

        return $this->render('@Frontend/Home/index.html.twig', ['categories' => $categories, 'publicity' => $publicity, 'products' => $products, 'sliderOne' => $sliders[0], 'sliderTwo' => $sliders[1], 'sliderThree' => $sliders[2]]);
    }

    public function postProductAction(Request $request)
    {
        // Set up required variables
        $this->initialise();
        $user = $this->getUser();
        if($user instanceof User){
            $NumberOfProductsLeft=$user->getNumberOfProductsLeft();
        }

        if (isset($NumberOfProductsLeft) && $NumberOfProductsLeft === 0){
            return $this->redirectToRoute('upgrade');
        }
        // New object
        $product = new Product();

        // Build the form
        $form = $this->createForm(ProductType::class, $product);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            // Check form data is valid
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $product->setOwner($user);
                $em->persist($product);
                $em->flush();

                // Redirect to view page
                return $this->redirectToRoute('homepage');
            }
        }
        return $this->render('@Frontend/Home/post.html.twig', ['form' => $form->createView(),'NumberOfProductsLeft' => $NumberOfProductsLeft]);

    }


    public function shopAction()
    {
        $em = $this->getDoctrine();
        $publicity = $em->getRepository(Gallery::class)->findOneBy(['type' => 'publicity']);
        $companies = $em->getRepository(Company::class)->findAll();
        $categories = $em->getRepository(Categories::class)->findAll();

        return $this->render('@Frontend/Home/shop.html.twig', ['companies'=>$companies,'categories' => $categories, 'publicity' => $publicity]);
    }

    public function wishlistAddAction(Product $product)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $product->addWishlistUser($user);
        $em->flush();
        return $this->render('@Frontend/Home/wishlist.html.twig', ['products' => $user->getProductWishlist()]);

    }

    public function wishlistRemoveAction(Product $product)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $product->removeWishlistUser($user);
        $em->flush();
        return $this->render('@Frontend/Home/wishlist.html.twig', ['products' => $user->getProductWishlist()]);

    }

    public function WishlistAction(Request $request)
    {
        $user = $this->getUser();
        return $this->render('@Frontend/Home/wishlist.html.twig', ['products' => $user->getProductWishlist()]);
    }

    public function accountAction()
    {
        $user = $this->getUser();
        if($user instanceof User){
            $NumberOfProductsLeft=$user->getNumberOfProductsLeft();
        }

        return $this->render('@Frontend/Home/account.html.twig', ['user' => $user,'NumberOfProductsLeft'=>$NumberOfProductsLeft]);
    }

    public function productAction(Product $product)
    {
        $em = $this->getDoctrine();
        $productDetails = $em->getRepository(Product::class)->find($product);
        $publicity = $em->getRepository(Gallery::class)->findOneBy(['type' => 'publicity']);

        $categories = $em->getRepository(Categories::class)->findAll();


        return $this->render('@Frontend/Home/product.html.twig', ['categories' => $categories, 'publicity' => $publicity, 'product' => $productDetails]);
    }

    public function productsByShopAction(Company $company)
    {
        $em = $this->getDoctrine();
        $products = $em->getRepository(Product::class)->findBy(['owner' => $company]);
        $publicity = $em->getRepository(Gallery::class)->findOneBy(['type' => 'publicity']);

        return $this->render('@Frontend/Home/company_products.html.twig', ['products' => $products, 'publicity' => $publicity]);

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
        return $this->redirectToRoute('front_edit_product', ['id' => $media->getProduct()->getId()]);
    }

    public function checkoutAction()
    {
        return $this->render('@Frontend/Home/checkout.html.twig');
    }

    public function typeAction()
    {
        return $this->render('@Frontend/Home/account_type.html.twig');
    }

    public function upgradeAction()
    {
        $user = $this->getUser();
        if($user instanceof Company)
        {
            $for_enterprise='true';
        }else{
            $for_enterprise='false';
        }
        $pricings = $this->getDoctrine()->getRepository(Pricing::class)->findBy(['forEnterprise' => $for_enterprise]);

        return $this->render('@Frontend/Home/upgrade.html.twig',['pricings' => $pricings]);
    }

    public function pricingAction($account_type)
    {
        if ($account_type == "member") {
            $for_enterprise = false;
        } else if ($account_type == "company") {
            $for_enterprise = true;
        }
        $pricings = $this->getDoctrine()->getRepository(Pricing::class)->findBy(['forEnterprise' => $for_enterprise]);

        return $this->render('@Frontend/Home/pricing.html.twig', ['pricings' => $pricings]);
    }

}
