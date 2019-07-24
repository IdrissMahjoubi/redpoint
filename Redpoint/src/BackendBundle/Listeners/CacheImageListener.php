<?php

namespace BackendBundle\Listeners;
use Doctrine\ORM\Event\LifecycleEventArgs;
use BackendBundle\Entity\Media;

class CacheImageListener
{
    protected $cacheManager;

    public function __construct($cacheManager)
    {
        $this->cacheManager = $cacheManager;
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Media) {
            // clear cache of thumbnail
            $this->cacheManager->remove($entity->getPath());
        }
    }

// when delete entity so remove all thumbnails related
    public function preRemove(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Media) {

            $this->cacheManager->remove($entity->getAbsolutePath());
        }
    }
}