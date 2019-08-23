<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 22/08/2019
 * Time: 16:39
 */

namespace UserBundle\Form;


use BackendBundle\Entity\Pricing;
use BackendBundle\Form\MediaType;
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
use UserBundle\Entity\User;
use UserBundle\Form\EventListener\packageFieldListener;


class RegistrationFormType extends AbstractType
{

    public function getParent()
    {
        return BaseRegistrationFormType::class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, array(
                'multiple' => false,
                'data' => 'member',
                'choices' => [
                    'Company' => 'company',
                    'Member' => 'member']
            ))
            ->add('address')
            ->add('package')
            ->add('image', MediaType::class);




    }
}