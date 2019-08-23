<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 22/08/2019
 * Time: 16:39
 */

namespace UserBundle\Form;


use BackendBundle\Entity\Pricing;
use BackendBundle\Form\PricingType;
use BackendBundle\Repository\PricingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseRegistrationFormType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;


class RegistrationFormType extends AbstractType
{

    /**
     * @var EntityRepository
     */
    private $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
       $this->repository = $entityManager->getRepository(Pricing::class);
   }


    public function getParent()
    {
        return BaseRegistrationFormType::class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, array('choices' => ['false' => 'Member', 'true' => 'Company'],
                'expanded' => true,
                'multiple' => false));

        $formModifier = function (FormInterface $form, $type) {
            $pricing = $this->repository->getPricingByType($type);
            $form->add('package', EntityType::class, [
                'class' => 'BackendBundle:Pricing',
                'choices' => $pricing,

            ]);
        };

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
                // this would be your entity, i.e. SportMeetup
                $type = $event->getData();

                $formModifier($event->getForm(), $type);
            }
        );

        $builder->get('type')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                $type = $event->getForm()->getData()->getType();

                $formModifier($event->getForm()->getParent(), $type);
            }
        );
    }



}