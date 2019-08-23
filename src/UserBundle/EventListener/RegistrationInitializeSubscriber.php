<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 07/08/2019
 * Time: 15:08
 */

namespace UserBundle\EventListener;


use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use UserBundle\Entity\Company;
use UserBundle\Entity\Member;

class RegistrationInitializeSubscriber implements EventSubscriberInterface
{
    private $router;

    public function __construct(UrlGeneratorInterface $router)
    {
        $this->router = $router;

    }


    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_INITIALIZE  => 'onRegistrationInitialize'
        );
    }


    public function onRegistrationInitialize(GetResponseUserEvent $event)
    {


    }


}