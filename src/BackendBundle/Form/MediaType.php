<?php

namespace BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use BackendBundle\Entity\Media;
use Vich\UploaderBundle\Form\Type\VichImageType;

class MediaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imageFile', VichImageType::class,['label'=>false,'allow_delete' => false,'download_link' => false,'required' => false,
                'attr' => array(
                'type' => 'file',
                'data-preview-file-type' => 'text',
                'data-allowed-file-extensions' => '["jpeg", "png", "jpg"]',
            )]);
    }/**
     * {@inheritdoc}
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Media::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'backendbundle_media';
    }


}
