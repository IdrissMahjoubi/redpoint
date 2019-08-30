<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\Gallery;
use BackendBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BackendBundle\Form\GalleryType;




class ProductController extends Controller
{
   
    public function showProductAction()
    {
        $em = $this->getDoctrine()->getRepository(Product::class);
        $product = $em->findAll();
        return $this->render('@Backend/Product/product_show.html.twig', ['products' => $product]);
    }

   public function deleteProductAction(Product $product)
   {
       $em = $this->getDoctrine()->getManager();
       foreach ($product->getImages() as $image) {
           $product->removeImage($image);
       }
       $em->remove($product);
       $em->flush();
       return $this->redirectToRoute('product_show_back');
   }







}
