<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 07/08/2019
 * Time: 15:08
 */

namespace UserBundle\EventListener;


use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Model\UserManagerInterface;
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
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess',

        );
    }

    public function onRegistrationSuccess(FormEvent $event)
    {
        var_dump($event->getRequest()->request->get('account-type'));
        die();

        if ($request->get('account-type') == "member") {
            $member = new Member();
            $member->loadFromParentObj($user);
            $member->setType('member');
            $member->setRoles(['ROLE_MEMBER']);
            return $member;

        } else if ($request->get('account-type') == 'company') {
            $company = new Company();
            $company->loadFromParentObj($user);
            $company->setType('company');
            $company->setRoles(['ROLE_COMPANY']);
            //$response->setTargetUrl($this->router->generate('front_account'));
            return $company;


        } else {
            dump("fuck");
            die();
        }

    }


}