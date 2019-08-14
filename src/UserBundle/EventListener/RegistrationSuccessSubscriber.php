<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 07/08/2019
 * Time: 15:08
 */

namespace UserBundle\EventListener;


use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use UserBundle\Entity\Company;
use UserBundle\Entity\Member;

class RegistrationSuccessSubscriber implements EventSubscriberInterface
{
    private $router;

    public function __construct(UrlGeneratorInterface $router)
    {
        $this->router = $router;

    }

    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_COMPLETED => 'onRegistrationConfirm',
        );
    }


    public function onRegistrationSuccess(FilterUserResponseEvent $event)
    {
        $user = $event->getUser();

        $response = $event->getResponse();


        if ($event->getRequest()->get('account_type') == 'company') {
            $member = new Member();
            $member->loadFromParentObj($user);
            $member->setType('member');
            $member->setRoles(['ROLE_MEMBER']);
            return $member;

        } else {
            $company = new Company();
            $company->loadFromParentObj($user);
            $company->setType('company');
            $company->setRoles(['ROLE_COMPANY']);
            return $company;

        }
    }


}