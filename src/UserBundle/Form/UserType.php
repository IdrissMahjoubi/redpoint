<?php

namespace UserBundle\Form;

use BackendBundle\Entity\Pricing;
use BackendBundle\Form\MediaType;
use BackendBundle\Repository\PricingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use UserBundle\Entity\User;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseRegistrationFormType;

class UserType extends AbstractType
{
    public function getParent()
    {
        return BaseRegistrationFormType::class;
    }

    private $repo;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repo = $entityManager->getRepository(Pricing::class);
    }
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('type', ChoiceType::class, array(
                'multiple' => false,
                'data' => 'member',
                'choices' => [
                    'Company' => 1,
                    'Member' => 0]
            ))
            ->add('address')
            ->add('package')
            ->add('image', MediaType::class);

        $formModifier = function (FormInterface $form, $type) {


            $packages = $this->repo->getPricingByType($type);
;

            $form->add('package', EntityType::class, [
                'class' => Pricing::class,
                'placeholder' => '',
                'choices'=>$packages
            ]);
        };

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
             function (FormEvent $event) use ($formModifier) {
                $data = $event->getData();
                $formModifier($event->getForm(), $data->getType());
            }
        );

        $builder->get('type')->addEventListener(
            FormEvents::POST_SUBMIT,
             function (FormEvent $event) use ($formModifier) {
                $type = $event->getForm()->getData();
                $formModifier($event->getForm()->getParent(), $type);
            }
        );


    }



    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'userbundle_user';
    }


}
