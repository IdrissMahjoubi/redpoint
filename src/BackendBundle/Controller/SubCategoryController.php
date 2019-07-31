<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\SubCategory;
use BackendBundle\Form\SubCategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SubCategoryController extends Controller

{
    public function addSubCategoryAction(Request $request)
    {

        $sub_category = new SubCategory();
        $form = $this->createForm(SubCategoryType::class, $sub_category, array(
            'attr' => array('class' => 'form-horizontal'),
        ));


        if ($request->getMethod() == Request::METHOD_POST) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($sub_category);
                $em->flush();
                return $this->redirectToRoute('sub_category_show');
            }
        }

        return $this->render('@Backend/SubCategory/sub_category_add.html.twig', ['form' => $form->createView()]);
    }

    public function showSubCategoryAction()
    {
        $sub_category = $this->getDoctrine()->getRepository(SubCategory::class)->findAll();
        return $this->render('@Backend/SubCategory/sub_category_show.html.twig', ['sub_category' => $sub_category]);
    }


    public function editSubCategoryAction(Request $request, SubCategory $sub_category)
    {

        $form = $this->createForm(SubCategoryType::class, $sub_category, array(
            'attr' => array('class' => 'form-horizontal'),
        ));
        //var_dump($sub_category->getImage()->getPath());
        if ($request->getMethod() == Request::METHOD_POST) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid())
            {
                $this->getDoctrine()->getManager()->flush();
            }
            return $this->redirectToRoute('sub_category_show');
        }

        return $this->render('@Backend/SubCategory/sub_category_edit.html.twig', array(
            'sub_category' => $sub_category,
            'form' => $form->createView(),
        ));
    }

    public function deleteSubCategoryAction(Request $request,SubCategory $sub_category)
    {

        $em=$this->getDoctrine()->getManager();
        $em->remove($sub_category);
        $em->flush();

        return $this->redirectToRoute('sub_category_show');
    }
}
