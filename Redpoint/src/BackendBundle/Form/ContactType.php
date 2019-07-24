<?php

namespace BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('adress',TextType::class,array('data_class' => null))
            ->add('numberone',TextType::class,array('data_class' => null) )
            ->add('numbertwo',TextType::class,array('data_class' => null))
            ->add('email',TextType::class,array('data_class' => null))
            ->add('map',TextType::class,array('data_class' => null))
            ->add('location',TextType::class,array('data_class' => null));
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackendBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'BackendBundle_Contact';
    }


}
