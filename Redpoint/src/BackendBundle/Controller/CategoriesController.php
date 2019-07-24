<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\Categories;
use BackendBundle\Form\CategoriesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;




class CategoriesController extends Controller
{
    public function addCategoriesAction(Request $request)
    {

        $categories = new Categories();
        $form = $this->createForm(CategoriesType::class, $categories, array(
            'attr' => array('class' => 'form-horizontal'),
        ));


        if ($request->getMethod() == Request::METHOD_POST) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($categories);
                $em->flush();
                return $this->redirectToRoute('categories_show');
            }
        }

        return $this->render('@Backend/Categories/categories_add.html.twig', ['form' => $form->createView()]);
    }

    public function showCategoriesAction()
    {
        $em = $this->getDoctrine()->getRepository(Categories::class);
        $categories = $em->findAll();
        return $this->render('@Backend/Categories/categories_show.html.twig', ['categories' => $categories]);
    }


    public function editCategoriesAction(Request $request, Categories $categories)
    {

        $form = $this->createForm(CategoriesType::class, $categories, array(
            'attr' => array('class' => 'form-horizontal'),
        ));
        if ($request->getMethod() == Request::METHOD_POST) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid())
            $em = $this->getDoctrine()->getManager();
            $categories->getImage()->upload();
            $em->flush();
            return $this->redirectToRoute('categories_show');
        }

       return $this->render('@Backend/Categories/categories_edit.html.twig', array(
           'categories' => $categories,
           'form' => $form->createView(),
       ));
   }

   public function deleteCategoriesAction(Request $request,Categories $categories)
   {
       $em=$this->getDoctrine()->getManager();
       $em->remove($categories);
       $em->flush();

       return $this->redirectToRoute('categories_show');
   }







}
