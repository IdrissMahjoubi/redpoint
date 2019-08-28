<?php

namespace UserBundle\Form;

use BackendBundle\Form\MediaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use UserBundle\Form\UserType as BaseUserFormType;
use UserBundle\Entity\Company;

class ProfileCompanyType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('address')
            ->add('image', MediaType::class,['required'=>false])
            ->add('companyName')
            ->add('about')
            ->add('Save',SubmitType::class,['attr'=>
            ['class'=>
            'button full-width button-sliding-icon ripple-effect margin-top-10'
            ]]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Company::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'userbundle_company';
    }


}
