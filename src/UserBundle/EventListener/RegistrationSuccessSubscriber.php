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
use Symfony\Component\BrowserKit\Request;
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
        $form = $event->getForm();
        $user = $form->getData();

        if($user->getType() === 'member'){
            $user->setRoles(['ROLE_MEMBER']);
        }else{
            $user->setRoles(['ROLE_COMPANY']);
        }
    }


}