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

class RegistrationCompletedSubscriber implements EventSubscriberInterface
{
    private $router;

    public function __construct(UrlGeneratorInterface $router)
    {
        $this->router = $router;

    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * ['eventName' => 'methodName']
     *  * ['eventName' => ['methodName', $priority]]
     *  * ['eventName' => [['methodName1', $priority], ['methodName2']]]
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess',
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